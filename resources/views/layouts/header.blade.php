<header class="site-header">
    <div class="header-inner">
        <h1>単語帳アプリ</h1>
        @if (Auth::check())
        <nav class="menu">
            <ul>
                <li><a href="{{ route('home')}}" class="{{ request()->routeIs('home') ? 'active' : ''}}">
                        🏠<span>ホーム</span></a>
                </li>
                <li><a href="{{ route('words.index')}}" class="{{ request()->routeIs('words.index') ? 'active' : ''}}">
                        📖<span>単語一覧</span></a>
                </li>
                <li><a href="{{route('words.create')}}" class="{{ request()->routeIs('words.create') ? 'active' : ''}}">
                        📝<span>単語登録</span></a>
                </li>

                <li><a href="{{ route('quiz') }}" class="{{ request()->routeIs('quiz') ? 'active' : '' }}">
                        🎴<span> クイズ</span></a>
                </li>
                <li><a href="{{ route('categories.index') }}"
                        class="{{ request()->routeIs('categories.index') ? 'active' : '' }}">
                        📂<span> カテゴリ管理</span></a></li>
                <li><a href="{{ route('profile.edit')}}"
                        class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        👤<span>プロフィール</span></a>
                </li>
                <li>
                    <a href="{{ route('users.switch.form') }}"
                        class="{{ request()->routeIs('users.switch.form') ? 'active' : '' }}">
                        <span>ユーザー切り替え</span></a>
                </li>
            </ul>
        </nav>
        <div class="auth-info">
            {{ Auth::user()->name }} さん
            <!-- ログアウトボタン -->
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    ログアウト
                </button>
            </form>
        </div>
        @else
        <!-- <div class="auth-links">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <a href="{{ route('login') }}">ログイン</a>
        </div> -->
        @endif
    </div>
</header>