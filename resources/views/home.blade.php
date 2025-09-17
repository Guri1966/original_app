@include('layouts.header')
@include('layouts.sidebar')
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
    </div>
    <!-- JavaScript 部分 -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const words = @json($words);
        let currentIndex = 0;

        const englishEl = document.getElementById("word-english");
        const onsetuEl = document.getElementById("word-onsetu");
        const yomikataEl = document.getElementById("word-yomikata");
        const imiEl = document.getElementById("word-imi");
        const ruigoEl = document.getElementById("word-ruigo");
        const iikaeEl = document.getElementById("word-iikae");
        const imageArea = document.getElementById("word-image-area");

        function updateWord(index) {
            const word = words[index];
            englishEl.textContent = word.english;
            onsetuEl.textContent = word.onsetu;
            yomikataEl.textContent = word.yomikata;
            imiEl.textContent = word.imi;
            ruigoEl.textContent = word.ruigo;
            iikaeEl.textContent = word.iikae;

            if (word.image_path) {
                imageArea.innerHTML =
                    `<img id="word-image" src="/storage/${word.image_path}" alt="word image" width="100">`;
            } else {
                imageArea.innerHTML = `<p id="word-image">イラストなし</p>`;
            }
        }

        updateWord(currentIndex);

        document.getElementById("prev-btn").addEventListener("click", function() {
            currentIndex = (currentIndex - 1 + words.length) % words.length;
            updateWord(currentIndex);
        });

        document.getElementById("next-btn").addEventListener("click", function() {
            currentIndex = (currentIndex + 1) % words.length;
            updateWord(currentIndex);
        });
    });
    </script>

    <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const words = @json($words); // PHPからJavaScriptに配列を渡す
        let currentIndex = 0;

        const englishEl = document.getElementById("word-english");
        const onsetuEl = document.getElementById("word-onsetu");
        const yomikataEl = document.getElementById("word-yomikata");
        const imiEl = document.getElementById("word-imi");
        const ruigoEl = document.getElementById("word-ruigo");
        const iikaeEl = document.getElementById("word-iikae");
        const imageArea = document.getElementById("word-image-area");

        function updateWord(index) {
            const word = words[index];
            englishEl.textContent = word.english;
            onsetuEl.textContent = word.onsetu;
            yomikataEl.textContent = word.yomikata;
            imiEl.textContent = word.imi;
            ruigoEl.textContent = word.ruigo;
            iikaeEl.textContent = word.iikae;

            if (word.image_path) {
                imageArea.innerHTML =
                    `<img id="word-image" src="/storage/${word.image_path}" alt="word image" width="100">`;
            } else {
                imageArea.innerHTML = `<p id="word-image">イラストなし</p>`;
            }
        }

        document.getElementById("prev-btn").addEventListener("click", function() {
            currentIndex = (currentIndex - 1 + words.length) % words.length;
            updateWord(currentIndex);
        });

        document.getElementById("next-btn").addEventListener("click", function() {
            currentIndex = (currentIndex + 1) % words.length;
            updateWord(currentIndex);
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const menuBtn = document.getElementById("menu-toggle");
        const sidebar = document.getElementById("sidebar");

        menuBtn.addEventListener("click", () => {
            sidebar.classList.toggle("active");
        });
    });
    </script> -->


</body>

</html>