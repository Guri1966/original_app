@include('layouts.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>単語帳アプリ</title>
</head>
<html>

<body>
    <div class="container">
        <div class="cardbox">
            <h2 style="margin-top:30px;">正解率の低い単語</h2>
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

</body>

</html>