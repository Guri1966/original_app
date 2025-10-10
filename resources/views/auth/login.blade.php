@extends('layouts.app')
@section('title', 'ログイン')
@section('header')
@include('layouts.header')
@endsection
@section('content')
<div class="container">
    <div class="wordsection">
        <h2 class="font-semibold text-gray-400 leading-normal text-[14px]">
            ログイン:メールアドレス、パスワードを入力してください。
        </h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>

            <!-- 新規ユーザー登録 -->
            <div class="auth-links" style="margin-top:100px;">
                <a href="{{ route('users.create') }}">新規登録</a>
            </div>
        </form>
    </div>
</div>
@endsection