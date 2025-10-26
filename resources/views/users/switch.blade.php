@extends('layouts.app')
@section('title', 'ユーザー切り替え')
@section('header')
@include('layouts.header')
@endsection
@section('content')


<div class="container">
    <div class="wordStore_area">
        <h2>ユーザー切り替え</h2>
        <form method="POST" action="{{ route('users.switch') }}">
            @csrf
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ Auth::id() == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
                @endforeach
            </select>
            <button type="submit">切り替え</button>
        </form>
    </div>
</div>
@endsection