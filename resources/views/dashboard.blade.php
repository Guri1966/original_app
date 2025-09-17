 @include('layouts.sidebar')
 <!DOCTYPE html>
 <html lang="ja">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     <title>dashboard</title>
 </head>
 <div class="container">
     <div class="wordsection">
         <div class="cardbox">
             {{ __("You're logged in!") }}
             <br>
             {{-- ログイン中のユーザー名を表示 --}}
             <strong>現在のユーザー: </strong> {{ Auth::user()->name }}
         </div>
     </div>
 </div>