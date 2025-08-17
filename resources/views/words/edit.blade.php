@include('layouts.header')

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>単語編集</title>
</head>

<body>
    <div class="container">
        <!-- 単語登録フォーム -->
        <div class="wordsection">
            <h2 class="font-semibold text-xl text-gray-800 leading-normal">
                単語編集フォーム
            </h2>
            <div class="wordStore_area">
                @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
                @endif
                <form action="{{ route('words.update', $word_info) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label>English:</label> {{-- ★ 追加 --}}
                    <input type="text" name="english" value="{{$word_info ->english }}">

                    <div>
                        <label>読み方:</label>
                        <input type="text" name="yomikata" value="{{$word_info ->yomikata }}">
                    </div>
                    <div>
                        <label>意味:</label>
                        <input type="text" name="imi" value="{{$word_info ->imi }}">
                    </div>
                    <div>
                        <label>類語:</label>
                        <input type="text" name="ruigo" value="{{$word_info ->ruigo }}">
                    </div>
                    <div>
                        <label>言い換え:</label>
                        <input type="text" name="iikae" value="{{$word_info ->iikae }}">
                    </div>
                    <button type="submit">編集</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>