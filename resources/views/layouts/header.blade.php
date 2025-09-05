    <header class="site-header">
        <div class="header-inner">
            <h1>単語帳アプリ</h1>
            @if (Auth::check())
            <nav class="menu">
                <ul>
                    <li><a href="{{ route('home')}}" class="{{ request()->routeIs('home') ? 'active' : ''}}">
                            🏠<span>ホーム</span></a>
                    </li>
                    <li><a href="{{ route('words.index')}}"
                            class="{{ request()->routeIs('words.index') ? 'active' : ''}}">
                            📖<span>単語帳</span></a>
                    </li>
                    <li><a href="{{route('words.create')}}" class="{{ request()->routeIs('create') ? 'active' : ''}}">
                            📝<span>単語登録</span></a>
                    </li>

                    <li><a href="{{ route('quiz') }}" class="{{ request()->routeIs('quiz') ? 'active' : '' }}">
                            🎴<span> クイズ</span></a>
                    </li>
                    <li><a href="{{ route('profile.edit')}}">👤
                            <span>プロフィール</span></a>
                    </li>
                </ul>
            </nav>
            <div class="auth-info">
                {{ Auth::user()->name }} さん
                <form method="GET" action="{{ route('dashboard') }}" style="display:inline;">
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
    background: #2d3748;
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