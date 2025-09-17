<!-- サイドバー -->
<aside id="sidebar" class="sidebar">
    <h2 class="menu-title">メニュー</h2>
    <ul>
        <li><a href="{{ route('home') }}">🏠 ホーム</a></li>
        <li><a href="{{ route('words.index') }}">📖 単語一覧</a></li>
        <li><a href="{{ route('words.create') }}">📝 単語登録</a></li>
        <li><a href="{{ route('quiz') }}">🎴 クイズ</a></li>
        <li><a href="{{ route('categories.index') }}">📂 カテゴリ管理</a></li>
        <li><a href="{{ route('profile.edit') }}">👤 プロフィール</a></li>
    </ul>
    <div class="auth-links" style="margin-top:100px;"> <a href="{{ route('register') }}">新規登録</a></div>
</aside>

<!-- ハンバーガーメニューのボタン -->
<button id="menu-toggle" class="menu-btn">☰</button>