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
                <div class="cardbox">
                    <h2 class="font-semibold text-xl text-gray-800 leading-normal">📖 カード型単語帳</h2>

                    <div class="card" id="word-card">
                        @if(!empty($words) && count($words) > 0)
                        @php
                        $wordsArray = $words->values()->toArray();
                        @endphp

                        <div id="word-content">
                            <h2 id="word-english">{{ $wordsArray[0]['english'] }}</h2>
                            <p><strong>読み方:</strong> <span id="word-yomikata">{{ $wordsArray[0]['yomikata'] }}</span>
                            </p>
                            <p><strong>意味:</strong> <span id="word-imi">{{ $wordsArray[0]['imi'] }}</span></p>
                            <p><strong>類語:</strong> <span id="word-ruigo">{{ $wordsArray[0]['ruigo'] }}</span></p>
                            <p><strong>言い換え:</strong> <span id="word-iikae">{{ $wordsArray[0]['iikae'] }}</span></p>
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
        </div>

        <script>
        // Eloquentコレクションを素直な配列としてJSへ
        const words = @json($words);

        let currentIndex = 0;

        function render() {
            const w = words[currentIndex];
            document.getElementById('word-content').innerHTML = `
      <h2 class="text-xl font-bold">${w.english ?? ''}</h2>
      <p><strong>読み方:</strong> ${w.yomikata ?? ''}</p>
      <p><strong>意味:</strong> ${w.imi ?? ''}</p>
      <p><strong>類語:</strong> ${w.ruigo ?? ''}</p>
      <p><strong>言い換え:</strong> ${w.iikae ?? ''}</p>
    `;
        }

        // words が存在する場合のみイベントを付与
        if (Array.isArray(words) && words.length > 0) {
            document.getElementById('next-btn').addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % words.length;
                render();
            });
            document.getElementById('prev-btn').addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + words.length) % words.length;
                render();
            });
            render(); // 初期描画
        }
        </script>

    </body>

    </html>