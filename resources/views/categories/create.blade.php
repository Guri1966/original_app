@extends('layouts.app')
@section('title', 'カテゴリ管理')
@section('header')
@include('layouts.header')
@endsection
@section('content')
<div class="container">
    <h2 style=margin-top:50px;>カテゴリ作成</h2>

    {{--バリデーションエラー表示--}}
    @if ($errors->any())
    <div class="alret alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('categories.store')}}" method="POST">
        @csrf
        <div>
            <label for="name">カテゴリ名</label>
            <input type="text" name="name" id="name" value="{{ old('name')}}" required>
        </div>

        <button type="submit">作成</button>
    </form>

    <a href="{{ route('categories.index') }}">カテゴリ一覧へ戻る</a>
</div>
@endsection