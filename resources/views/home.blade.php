<?php
  $words = [
        [
            "読み方" => "たんごちょう",
            "意味" => "単語を記録・暗記するためのノートやアプリ",
            "類語" => "単語ノート",
            "言い換え" => "語彙帳"
        ],
    ];
   
?>

<!DOCTYPE html>
<html lang="ja">
@include('layouts.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>単語帳アプリ</title>
    <link><a href="learn">buttonタグについて</a></link>
</head>



<body>
    <div class="container">
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
                    <?php foreach($words as $word):?>
                    <tr>
                        <td><?php echo $word["読み方"]; ?></td>
                        <td><?php echo $word["意味"]; ?></td>
                        <td><?php echo $word["類語"]; ?></td>
                        <td><?php echo $word["言い換え"]; ?></td>
                    </tr>
                    <?php endforeach; ?>
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
<footer></footer>

</html>