{{-- @var \Illuminate\App\Models\Word $words --}}

@extends('layouts.app')
@section('title', '単語登録')
@section('header')
@include('layouts.header')
@endsection
@section('content')
<div class="container">
    <!-- 単語登録フォーム -->
    <div class="wordsection">
        <h2 class="font-semibold text-xl text-gray-800 leading-normal">
            単語登録フォーム
        </h2>
        <div class="wordStore_area">
            @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
            @endif
            <form action="{{ route('words.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>English:</label> {{-- ★ 追加 --}}
                    <input type="text" name="english" required>
                </div>
                <div>
                    <label>音節:</label>
                    <input type="text" name="onsetu">
                </div>
                <div>
                    <label>読み方:</label>
                    <input type="text" name="yomikata">
                </div>
                <div>
                    <label>意味:</label>
                    <input type="text" name="imi" required>
                </div>
                <div>
                    <label>類語:</label>
                    <input type="text" name="ruigo">
                </div>
                <div>
                    <label>言い換え:</label>
                    <input type="text" name="iikae">
                </div>
                <div>
                    <label>イラスト:</label>
                    <input type="file" name="image">
                </div>
                <div>
                    <label for="category_id">カテゴリ</label>
                    <select name="category_id" id="category_id">
                        <option value="">未分類</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id}}" @selected(old('category_id', $word->category_id
                            ??'')== $category->id)>
                            {{ $category->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>hold_flag:</label>
                    <input type="hidden" name="hold_flag" value="0">
                    <input type="checkbox" name="hold_flag" value="1">
                </div>
                <button type="submit">追加</button>
            </form>
        </div>
    </div>
</div>