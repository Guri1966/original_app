<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>HTMLのbuttonタグ解説</title>
    <style>
    body {
        font-family: sans-serif;
        line-height: 1.6;
        padding: 20px;
    }

    h2 {
        color: #174a5c;
    }

    code {
        background-color: #f0f0f0;
        padding: 2px 4px;
        border-radius: 4px;
    }

    .button-example {
        background-color: #174a5c;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
    }

    .button-example:hover {
        background-color: orange;
    }
    </style>
</head>

<body>

    <h1>HTMLの&lt;button&gt;タグ解説</h1>

    <h2>1. buttonタグの役割</h2>
    <p>
        <code>&lt;button&gt;</code>タグは、Webページにボタンを作成するために使用します。フォームの送信や任意の処理トリガーとして活用され、簡単にボタン要素を挿入できます。
    </p>

    <h2>2. 基本構文</h2>
    <pre><code>&lt;button type="submit" name="send" value="send_value"&gt;
  送信
&lt;/button&gt;</code></pre>

    <h2>3. 指定できる属性</h2>
    <ul>
        <li><strong>type</strong>：ボタンの種類を指定（<code>submit</code>、<code>reset</code>、<code>button</code>）。初期値は<code>submit</code>
        </li>
        <li><strong>form</strong>：関連付ける<form>のIDを指定</li>
        <li><strong>name</strong>：ボタンの名前。JavaScriptやサーバー送信で利用</li>
        <li><strong>value</strong>：ボタン自体の送信値</li>
        <li><strong>disabled</strong>：ボタンを無効化</li>
        <li><strong>autofocus</strong>：ページ表示時に自動でフォーカスを当てる</li>
        <li><strong>formtarget</strong>（type="submit"時）：送信先ウィンドウやタブを指定</li>
        <li>その他：<code>formaction</code>、<code>formenctype</code>、<code>formmethod</code>、<code>formnovalidate</code>など（type="submit"時）
        </li>
    </ul>

    <h2>4. 他タグとの違い</h2>

    <h3>aタグとの違い</h3>
    <ul>
        <li><code>&lt;a&gt;</code>はリンク用、<code>&lt;button&gt;</code>はフォーム送信用</li>
        <li><code>&lt;a&gt;</code>はCSSでボタン風にスタイリング</li>
    </ul>

    <h3>inputタグとの違い</h3>
    <ul>
        <li><code>&lt;input type="button"&gt;</code>は閉じタグなし。<code>&lt;button&gt;</code>は中身を自由に記述可能</li>
        <li><code>&lt;button&gt;</code>では擬似要素（<code>::before</code>や<code>::after</code>）が使えるため、より自由なデザインが可能</li>
    </ul>

    <h2>5. ボタンのCSSデザイン例</h2>
    <p>以下はボタンの装飾例です。</p>

    <button class="button-example">送信</button>

    <pre><code>.button-example {
  background-color: #174a5c;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
}

.button-example:hover {
  background-color: orange;
}</code></pre>

    <h2>6. デザイン変更ポイント</h2>
    <ul>
        <li>背景色：<code>background-color</code></li>
        <li>文字色：<code>color</code></li>
        <li>余白：<code>padding</code></li>
        <li>枠線削除：<code>border-style: none;</code></li>
        <li>ホバー効果：<code>:hover</code>を使ってマウス時変化</li>
        <li>角を丸くする：<code>border-radius</code>指定</li>
    </ul>

    <p>以上の内容を踏まえて、目的に応じたボタン作成と装飾を行いましょう。</p>

</body>

</html>