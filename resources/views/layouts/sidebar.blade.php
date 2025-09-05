<!-- サイドバー -->
<aside id="sidebar" class="sidebar">
    <h2 class="menu-title">メニュー</h2>
    <ul>
        <li><a href="{{ route('home') }}">🏠 ホーム</a></li>
        <li><a href="{{ route('words.index') }}">📖 単語帳</a></li>
        <li><a href="{{ route('words.create') }}">📝 単語登録</a></li>
        <li><a href="{{ route('quiz') }}">🎴 クイズ</a></li>
        <li><a href="{{ route('profile.edit') }}">👤 プロフィール</a></li>
    </ul>
</aside>

<!-- ハンバーガーメニューのボタン -->
<button id="menu-toggle" class="menu-btn">☰</button>