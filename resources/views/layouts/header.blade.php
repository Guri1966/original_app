    <header class="site-header">
        <div class="header-inner">
            <h1>単語帳アプリ</h1>

            @if (Auth::check())
            <nav class="menu">
                <ul>
                    <li><a href="{{ route('home')}}" class="{{ request()->routeIs('home') ? 'active' : ''}}">🏠 Home</a>
                    </li>
                    <li><a href="{{route('resist')}}" class="{{ request()->routeIs('resist') ? 'active' : ''}}">📝
                            単語登録</a>
                    </li>
                    <li><a href="{{ route('words.index')}}"
                            class="{{ request()->routeIs('words.index') ? 'active' : ''}}">📖
                            単語帳一覧</a></li>
                    <li><a href="{{ route('flashcards')}}"
                            class="{{ request()->routeIs('flashcards') ? 'active' : ''}}">🧠
                            学習モード</a></li>
                    <li><a href="{{ route('profile.edit')}}">👤
                            プロフィール</a></li>
                </ul>
            </nav>

            <div class="auth-info">
                {{ Auth::user()->name }} さん
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">ログアウト</button>
                </form>
            </div>
            @else
            <div class="auth-links">
                <a href="{{ route('login') }}">ログイン</a>
                <a href="{{ route('register') }}">新規登録</a>
            </div>
            @endif
        </div>
    </header>
    <style>
.site-header {
    background: #20c1d6ff;
    color: #fff;
    padding: 10px 20px;
    position: fixed;
    /* 固定表示 */
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
}

.header-inner {
    display: flex;
    justify-content: space-between;
    align-items: 100%;
}

.menu ul {
    list-style: none;
    display: flex;
    gap: 15px;
    padding: 30px 10px;
}

.menu a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

.menu a:hover {
    text-decoration: underline;
}

.auth-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logout-btn {
    background: #ff4d4d;
    color: white;
    border: none;
    padding: 10px;
    margin: 10px 30px;
    border-radius: 4px;
    cursor: pointer;
}

.logout-btn:hover {
    background: #cc0000;
}

/* ヘッダー高さ分の余白をページ上部に追加 */
body {
    padding-top: 70px;
}
    </style>