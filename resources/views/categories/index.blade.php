@include('layouts.header')
@include('layouts.sidebar')
@extends('layouts.app')
@section('title', '単語帳アプリ')
@section('header')
@include('layouts.header')
@endsection
@section('content')

<div class="container" style="margin-top:0px;">
    <div class="wordsection">
        <h2>カテゴリ一覧</h2>

        {{-- 成功メッセージ表示 --}}
        @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
        @endif
        <a href="{{ route('categories.create') }}">+ 新規追加</a>
        <table class="category">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>カテゴリ名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('categories.edit' , $category->id) }}" method="GET"
                            style="display:inline;">
                            <button type="sumit">編集</button>
                        </form>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection