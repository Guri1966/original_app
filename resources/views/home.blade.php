@include('layouts.header')
@php
$words = [
[
"yomikata" => "たんごちょう",
"imi" => "単語を記録・暗記するためのノートやアプリ",
"ruigo" => "単語ノート",
"iikae" => "語彙帳"
],
];
@endphp

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>単語帳アプリ</title>
</head>

<body>
    <div class="container">
        <!-- 単語登録フォーム -->
        <div class="wordStore_area">
            @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
            @endif
            <form action="{{ route('words.store') }}" method="POST">
                @csrf
                <div>
                    <label>English:</label> {{-- ★ 追加 --}}
                    <input type="text" name="english" required>
                </div>
                <div>
                    <label>読み方:</label>
                    <input type="text" name="yomikata" required>
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
                <button type="submit">追加</button>
            </form>
        </div>
        <!-- //カード型の単語帳 表 -->
        <div class="cardbox">
            <span>カード型単語帳</span>
            <div class="card">
                <table>
                    <span>"words->EnglishWord"</span>
                    <tr>
                        <th>読み方</th>
                        <th>意味</th>
                        <th>類語</th>
                        <th>言い換え</th>
                    </tr>
                    {{-- 一時的にコメントアウトして確認 --}}
                    {{-- @dd($words) --}}
                    @foreach($words as $word)
                    <tr>
                        <td>{{ $word['yomikata'] }}</td>
                        <td>{{ $word['imi'] }}</td>
                        <td>{{ $word['ruigo'] }}</td>
                        <td>{{ $word['iikae'] }}</td>
                    </tr>
                    @endforeach
                    <!-- //カード型の単語帳 裏 -->
                </table>
                <div class="button_area">
                    <button>&lt;&lt;</button>
                    <button>&gt;&gt;</button>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <ul>
        <li><a href="learn">buttonタグについて</a></li>
    </ul>
</footer>

</html>