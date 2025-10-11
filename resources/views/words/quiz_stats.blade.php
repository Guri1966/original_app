@extends('layouts.app')
@section('title', 'クイズ結果')
@section('header')
@include('layouts.header')
@endsection
@section('content')

<div class="container">

    <div class="cardbox">
        <h2 style="margin-top:30px;">正解率の低い単語</h2>
        <a href="{{ route('quiz') }}">クイズ問題へ戻る</a>
    </div>
    <table>
        <tr>
            <th>英単語</th>
            <th>日本語訳</th>
            <th>正解率</th>
        </tr>
        @foreach($words as $word)
        <tr>
            <td>{{ $word->english }}</td>
            <td>{{ $word->imi }}</td>
            <td>{{ round($word->correct_count / $word->answer_count * 100, 1) }}%</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection