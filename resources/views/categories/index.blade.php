@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>カテゴリ一覧</title>
</head>
<div class="container">
    <div class="wordsection">
        <h2>カテゴリ一覧</h2>

        {{-- 成功メッセージ表示 --}}
        @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('categories.create') }}">＋ 新規追加</a>

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>カテゴリ名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}">編集</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</html>