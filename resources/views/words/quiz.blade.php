@extends('layouts.app')
@section('title', 'クイズ')

@section('header')
@include('layouts.header')
@endsection

@section('content')
<div class="container" style="margin-top:50px;">
    {{-- エラーメッセージの表示 --}}
    @if (!empty($error))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
    @endif

    <div class="wordsection">
        {{-- 単語が十分ある時だけクイズを表示 --}}
        @if (isset($question) && isset($choices))
        <div class="cardbox">
            <h2 class="font-semibold text-xl text-gray-800 leading-normal">
                次の英単語の意味は？
            </h2>
        </div>

        <div class="cardbox">
            <p class="text-xl font-bold">{{ $question->english }}</p>
        </div>

        <div class="card">
            <ul class="choice-list">
                @foreach($choices as $choice)
                <li>
                    <button class="choice" data-answer="{{ $choice }}" data-correct="{{ $correctAnswer }}"
                        data-word-id="{{ $question->id }}">
                        {{ $choice }}
                    </button>
                    <span class="mark"></span> <!-- 正誤マーク -->
                </li>
                @endforeach
            </ul>
            <form action="{{ route('quiz')}}" method="GET">
                @csrf
                <input type="hidden" name="sumbit">
                <div class="button_area">
                    <button id="next-btn">&gt;&gt;</button>
                </div>
            </form>
        </div>

        {{-- ✅ JSで使用する設定を渡す --}}
        <script>
        window.quizConfig = {
            url: "{{ route('quiz.check') }}",
            csrf: "{{ csrf_token() }}"
        };
        </script>

        {{-- ✅ クイズ判定スクリプト --}}
        <script src="{{ asset('js/quiz.js') }}"></script>
        @else
        <p>クイズを作成するには、十分な単語が登録されていません。</p>
        @endif
    </div>
</div>
@endsection