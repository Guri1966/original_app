@extends('layouts.app')
@section('title', 'カテゴリ編集')
@section('header')
@include('layouts.header')
@endsection
@section('content')
<div class="container">
    <h2 style=margin-top:50px;>カテゴリ編集</h2>

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
    <form action="{{ route('categories.update' , $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">カテゴリ名</label>
            <input type="text" name="name" id="name" value="{{ old('name')}}" required>
        </div>

        <button type="submit">更新</button>
    </form>

    <a href="{{ route('categories.index') }}">カテゴリ一覧へ戻る</a>
</div>
@endsection