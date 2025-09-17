    @include('layouts.sidebar')
    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>単語帳アプリ</title>
    </head>

    <body>
        <div class="container">
            <h2>ユーザー切り替え</h2>
            <form method="POST" action="{{ route('users.switch') }}">
                @csrf
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ Auth::id() == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
                <button type="submit">切り替え</button>
            </form>
        </div>
    </body>