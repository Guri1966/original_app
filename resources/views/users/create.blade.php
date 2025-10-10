@extends('layouts.app')
@section('title', '新規ユーザー登録')
@section('header')
@include('layouts.header')
@endsection
@section('content')

<div class=container>
    <div class="wordStore_area">
        @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
        @endif
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="名前">
            <input type="email" name="email" placeholder="メールアドレス">
            <input type="password" name="password" placeholder="パスワード">
            <input type="password" name="password_confirmation" placeholder="パスワード確認">
            <button type="submit">登録</button>
        </form>
    </div>
</div>
@endsection