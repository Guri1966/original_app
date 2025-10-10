@extends('layouts.app')
@section('title', '単語登録')
@section('header')
@include('layouts.header')
@endsection
@section('content')

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
@endsection