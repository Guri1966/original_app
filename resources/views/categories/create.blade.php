@include('layouts.header')
@include('layouts.sidebar')
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カテゴリ作成</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <h2 style=margin-top:50px;>カテゴリ作成</h2>

        {{--バリデーションエラー表示--}}
        @if ($errors->any())
        <div class="alret alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('categories.store')}}" method="POST">
            @csrf
            <div>
                <label for="name">カテゴリ名</label>
                <input type="text" name="name" id="name" value="{{ old('name')}}" required>
            </div>

            <button type="submit">作成</button>
        </form>

        <a href="{{ route('categories.index') }}">カテゴリ一覧へ戻る</a>
    </div>
</body>

</html>