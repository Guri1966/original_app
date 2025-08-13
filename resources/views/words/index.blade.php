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
                                <button><a href="{{ route('words.edit', $word->id) }}">編集</a></botton>
                                    <form action="{{ route('words.destroy', $word->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('本当に削除しますか？');">削除</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>