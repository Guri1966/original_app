<header class="site-header">
    <div class="header-inner">
        <h1>単語帳アプリ</h1>
        @if (Auth::check())
        <nav class="menu">
            <ul>
                <li><a href="{{ route('words.home')}}" class="{{ request()->routeIs('showHome') ? 'active' : ''}}">
                        <i class="fa-solid fa-house"></i><span>ホーム</span></a>
                </li>
                <li><a href="{{ route('words.index')}}" class="{{ request()->routeIs('words.index') ? 'active' : ''}}">
                        <i class="fa-solid fa-list"></i><span>単語一覧</span></a>
                </li>
                <li><a href="{{route('words.create')}}" class="{{ request()->routeIs('words.create') ? 'active' : ''}}">
                        <i class="fa-solid fa-file"></i><span>単語登録</span></a>
                </li>

                <li><a href="{{ route('words.quiz') }}" class="{{ request()->routeIs('showQuiz') ? 'active' : '' }}">
                        <i class="fa-solid fa-circle-question"></i><span> クイズ</span></a>
                </li>
                <li><a href="{{ route('categories.index') }}"
                        class="{{ request()->routeIs('categories.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-book"></i><span> カテゴリ管理</span></a></li>
                <li><a href="{{ route('profile.edit')}}"
                        class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <i class="fa-solid fa-user"></i><span>プロフィール</span></a>
                </li>
                <li>
                    <a href="{{ route('users.switch.form') }}"
                        class="{{ request()->routeIs('users.switch.form') ? 'active' : '' }}">
                        <i class="fa-solid fa-users"></i><span>ユーザー切り替え</span></a>
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
        @endif
    </div>
</header>