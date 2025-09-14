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
        <div class="wordsection">
            <div class="cardbox">
                <h2 class="font-semibold text-xl text-gray-800 leading-normal">単語編集フォーム</h2>
                <div class="wordStore_area">
                    @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                    @endif
                    <form action="{{ route('words.update',  $word->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label>English:</label> {{-- ★ 追加 --}}
                        <input type="text" name="english" value="{{$word ->english }}">
                        <div>
                            <label>音節:</label>
                            <input type="text" name="onsetu" value="{{$word ->onsetu }}">
                        </div>
                        <div>
                            <label>読み方:</label>
                            <input type="text" name="yomikata" value="{{$word ->yomikata }}">
                        </div>
                        <div>
                            <label>意味:</label>
                            <input type="text" name="imi" value="{{$word ->imi }}">
                        </div>
                        <div>
                            <label>類語:</label>
                            <input type="text" name="ruigo" value="{{$word ->ruigo }}">
                        </div>
                        <div>
                            <label>言い換え:</label>
                            <input type="text" name="iikae" value="{{$word ->iikae }}">
                        </div>
                        <div>
                            <label>イラスト:</label>
                            @if($word->image_path)
                            <img src="{{ asset('storage/' . $word->image_path) }}" alt="イラスト" width="100">
                            @else
                            <p>イラストは登録されていません。</p>
                            @endif
                            <input type="file" name="image">
                        </div>
                        <div>
                            <label for="category_id">カテゴリ</lable>
                                <select name="category_id" id="category_id">
                                    <option value="">未分類</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id}}" @selected(old('category_id', $word->category_id
                                        ??'')== $category->id)>
                                        {{ $category->name}}
                                    </option>
                                    @endforeach
                                </select>
                        </div>
                        <button type="submit">編集</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>