@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>単語帳アプリ</title>
</head>
<div class="container">
    <div class="wordsection">
        <h2 class="font-semibold text-xl text-gray-800 leading-normal">
            📖 単語帳一覧
        </h2>
        <button class="btn btn2" style="width:91%;max-width:300px;" onclick="location.href='#'; loadScript(29);">
            英検1級の単語をぜんぶ見る</button>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(session('success'))
                <div style="color: green;">{{ session('success') }}</div>
                @endif

                @if($words->isEmpty())
                <p>まだ単語が登録されていません。</p>
                @else
                <table class="cardbox">
                    <thead>
                        <tr>
                            <th>英語</th>
                            <th>読み方</th>
                            <th>意味</th>
                            <th>類語</th>
                            <th>言い換え</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($words as $word)
                        <tr>
                            <td>{{ $word->english }}</td>
                            <td>{{ $word->yomikata }}</td>
                            <td>{{ $word->imi }}</td>
                            <td>{{ $word->ruigo }}</td>
                            <td>{{ $word->iikae }}</td>
                            <td>
                                <div class="btn_area">
                                    <div class="edit_area">
                                        <form action="{{ route('words.edit', $word->id) }}" method="GET">
                                            @csrf
                                            <!-- <input type="hidden" name="edit_id" value="{{$word->id}}"> -->
                                            <input type="submit" value="編集">
                                        </form>
                                    </div>
                                    <div class="del_area">
                                        <form action="{{ route('words.destroy', $word->id) }}" method="POST"
                                            onsubmit="return confirm('本当に削除しますか？')" ;>
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="削除">
                                        </form>
                                    </div>
                                    <div class="checkbox">
                                        <form action="{{ route('words.hold',$word->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="hold_flag" value="0">
                                            <!-- hiddenを仕込んで常に0 or 1を送る -->
                                            <input type="checkbox" name="hold_flag" value="1"
                                                onchange="this.form.submit()" {{$word->hold_flag ? 'checked': ''}}>
                                        </form>
                                    </div>
                                </div>
            </div>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            @endif
        </div>
    </div>
</div>