    @include('layouts.header')

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
            <div class="wordsection">
                <!-- //カード型の単語帳 表 -->
                <div class=" cardbox">
                    <h2 class="font-semibold text-xl text-gray-800 leading-normal">
                        📖 カード型単語帳
                    </h2>
                    <div class="card">
                        @if(count($words) > 0)
                        @php
                        $word = $words[0]; // 最初の1語だけ取り出す
                        @endphp
                        <table>
                            <caption style="font-weight: bold; font-size: 1.2em;">
                                {{ $word->english }}
                            </caption>
                            <tr>
                                <th>読み方</th>
                                <th>意味</th>
                                <th>類語</th>
                                <th>言い換え</th>
                            </tr>
                            <tr>
                                <td>{{ $word->yomikata }}</td>
                                <td>{{ $word->imi }}</td>
                                <td>{{ $word->ruigo }}</td>
                                <td>{{ $word->iikae }}</td>
                            </tr>
                        </table>
                        @else
                        <p>単語が登録されていません。</p>
                        @endif
                        <div class="button_area">
                            <button>&lt;&lt;</button>
                            <button>&gt;&gt;</button>
                        </div>
                    </div>
                    <!-- //カード型の単語帳 裏 -->
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