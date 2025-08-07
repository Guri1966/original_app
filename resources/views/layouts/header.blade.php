 <header>
     <div class="d-flex header_flex">
         <div class="right_header">
         </div>

         <div class="left_header">
             <ul>
                 @if(Auth::check())
                 <li>
                     <form action="{{ route('logout') }}" method="post">
                         @csrf
                         <input class="logout_btn" type="submit" value="ログアウト" />
                     </form>
                 </li>
                 <li>ユーザー名：{{ Auth::user()->name }}</li>
                 @else
                 <li><a href="{{ route('login') }}">ログイン</a></li>
                 <li><a href="{{ route('register') }}">新規登録</a></li>
                 @endif
             </ul>
         </div>
     </div>
 </header>