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