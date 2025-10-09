{{-- @var \Illuminate\App\Models\Word $words --}}

@extends('layouts.app')
@section('title', '単語帳アプリ')
@section('header')
@include('layouts.header')
@endsection
@section('content')
<div class="container">
    <div class="wordsection">
        <h2 class="mt-0 font-semibold text-xl text-gray-800 leading-normal">
            📖 カード型単語帳
        </h2>
        <div class="card" id="word-card">
            @if(isset($words) && $words->count() > 0)
            @php
            $words = $words->values()->toArray();
            @endphp
            <div id="word-content">
                <h2 id="word-english">{{ $words[0]['english'] }}</h2>
                <p><strong>音節:</strong> <span id="word-onsetu">{{ $words[0]['onsetu'] }}</span>
                </p>
                <p><strong>読み方:</strong> <span id="word-yomikata">{{ $words[0]['yomikata'] }}</span>
                </p>
                <p><strong>意味:</strong> <span id="word-imi">{{ $words[0]['imi'] }}</span></p>
                <p><strong>類語:</strong> <span id="word-ruigo">{{ $words[0]['ruigo'] }}</span></p>
                <p><strong>言い換え:</strong> <span id="word-iikae">{{ $words[0]['iikae'] }}</span></p>
                <p><strong>イラスト:</strong>
            </div>
            <!-- 画像表示エリア -->
            <div id="word-image-area">
                @if(!empty($words[0]['image_path']))
                <img id="word-image" src="{{ $words[0]['image_path'] ? asset('storage/' . $words[0]['image_path']) 
                                : asset('images/dummy.png') }}" alt="word image" width="100">
                @else
                <p id="word-image">イラストなし</p>
                @endif
            </div>

            <div class="button_area">
                <button id="prev-btn">&lt;&lt;</button>
                <button id="next-btn">&gt;&gt;</button>
            </div>

            @else
            <p>単語が登録されていません。</p>
            @endif
        </div>
    </div>
</div>
@endsection

<!-- PHP変数$wordsをJSで使えるようにする -->
<script>
window.words = @json($words);
</script>
<script src="{{ asset('js/main.js') }}"></script>

</html>