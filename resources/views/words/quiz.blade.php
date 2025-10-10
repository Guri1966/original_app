<!-- <pre>{{ var_dump($error ?? 'error not set') }}</pre> -->

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
            <h2 class="font-semibold text-xl text-gray-800 leading-normal">次の英単語の意味は？</h2>
        </div>
        <div class="cardbox">
            <p class="text-xl font-bold">{{ $question->english }}</p>
        </div>
        <div class="card">
            <ul>
                @foreach($choices as $choice)
                <li>
                    <button class="choice" data-answer="{{ $choice }}" data-correct="{{ $correctAnswer }}"
                        data-word-id="{{ $question->id }}">
                        {{ $choice }}
                    </button>
                    <span class="mark"></span> <!-- 正誤マーク表示場所 -->
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
        <form action="{{ route( 'quiz.stats' ) }}" method="GET">
            @csrf
            <input type="hidden" name="submit" value="">
            <x-primary-button>正解率の低い単語</x-primary-button>
        </form>
    </div>
    @endif
</div>

<p id="result" class="mt-3 text-lg font-bold"></p>
<script>
window.quizConfig = {
    url: "{{ route('quiz.check') }}",
    csrf: "{{ csrf_token() }}"
};
</script>
<script src="{{ asset('js/quiz.js') }}"></script>