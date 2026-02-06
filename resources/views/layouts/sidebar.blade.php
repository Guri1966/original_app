<!-- サイドバー -->
@if (Auth::check())
<aside id="sidebar" class="sidebar">
    <h2 class="menu-title">メニュー</h2>
    <ul>
        <li><a href="{{ route('words.home') }}"><i class="fa-solid fa-house"></i> ホーム</a></li>
        <li><a href="{{ route('words.index') }}"><i class="fa-solid fa-list"></i> 単語一覧</a></li>
        <li><a href="{{ route('words.create') }}"><i class="fa-solid fa-file"></i> 単語登録</a></li>
        <li><a href="{{ route('words.quiz') }}"><i class="fa-solid fa-circle-question"></i> クイズ</a></li>
        <li><a href="{{ route('categories.index') }}"><i class="fa-solid fa-book"></i> カテゴリ管理</a></li>
        <li><a href="{{ route('profile.edit') }}"><i class="fa-solid fa-user"></i> プロフィール</a></li>
    </ul>
</aside>
@endif