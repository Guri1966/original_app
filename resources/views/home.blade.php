@php
$words = [
[
"読み方" => "たんごちょう",
"意味" => "単語を記録・暗記するためのノートやアプリ",
"類語" => "単語ノート",
"言い換え" => "語彙帳"
],
];
@endphp

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>単語帳アプリ</title>
</head>

<body>
    {{-- ▼ ヘッダーエリア --}}
    <header class="site-header">
        <div class="header-inner">
            <h1>単語帳アプリ</h1>
            {{-- ▼ ログイン状態による表示の切り替え --}}
            @if (Auth::check())
            <div class="auth-info">
                {{Auth::user()->name}}さん
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button type="submit" class="logout-btn">ログアウト
                </form>
            </div>
            @else
            <div class="auth-links">
                <a href="{{route('login')}}">ログイン</a>
                <a href="{{route('register')}}">新規登録/</a>
            </div>
            @endif
        </div>
    </header>

    <div class="container">
        <!-- //カード型の単語帳 表 -->
        <div class="cardbox">
            <span>カード型単語帳</span>
            <div class="card">
                <table>
                    <span>"words->EnglishWord"</span>
                    <tr>
                        <th>読み方</th>
                        <th>意味</th>
                        <th>類語</th>
                        <th>言い換え</th>
                    </tr>
                    <?php foreach($words as $word):?>
                    <tr>
                        <td><?php echo $word["読み方"]; ?></td>
                        <td><?php echo $word["意味"]; ?></td>
                        <td><?php echo $word["類語"]; ?></td>
                        <td><?php echo $word["言い換え"]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <!-- //カード型の単語帳 裏 -->
                </table>
                <div class="button_area">
                    <button>&lt;&lt;</button>
                    <button>&gt;&gt;</button>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <ul>
        <li><a href="learn">buttonタグについて</a></li>
    </ul>
</footer>

</html>