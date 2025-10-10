@extends('layouts.app')
@section('title', '単語帳アプリ')
@section('header')
@include('layouts.header')
@endsection
@section('content')
@include('layouts.sidebar')
<div class=container>
    <div class="wordStore_area">
        <h2 class="font-semibold text-gray-400 leading-normal text-[14px]">
            新規ユーザー登録を行ってください
        </h2>
        @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
        @endif
        <form class="form-control" action="{{ route('users.store') }}" method="POST" autocomplete="off">
            @csrf
            <input type="text" name="name" placeholder="名前" required autocomplete="off">
            <input type="email" name="email" placeholder="メールアドレス" required autocomplete="off">
            <input type="password" name="password" placeholder="パスワード" required autocomplete="new-password">
            <input type="password" name="password_confirmation" placeholder="パスワード確認" required
                autocomplete="new-password">
            <button type="submit">登録</button>
        </form>
    </div>
</div>
@endsection