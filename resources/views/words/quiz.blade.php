<!-- <pre>{{ var_dump($error ?? 'error not set') }}</pre> -->

@include('layouts.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>英単語クイズ</title>
</head>
<html>

<body>
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
    // .choice クラスのボタンをすべて取得し、クリックイベントを登録。
    document.querySelectorAll('.choice').forEach(btn => {
        btn.addEventListener('click', () => {

            // ユーザーが選択肢をクリックすると、その選択肢のデータ属性から値を取り出す
            let answer = btn.dataset.answer; // ユーザーの答え
            let correct = btn.dataset.correct; // 正解
            let wordId = btn.dataset.wordId; // 単語ID
            let markSpan = btn.parentElement.querySelector('.mark');

            // マークをリセット
            document.querySelectorAll('.mark').forEach(m => {
                m.textContent = "";
                m.className = "mark";
            });
            // fetch() を使って Laravelのルート quiz.check に POST でリクエストを送る
            fetch("{{ route('quiz.check') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}", // CSRF トークンを付与（Laravel必須）
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        word_id: wordId,
                        answer: answer,
                        correctAnswer: correct
                    })
                })
                // サーバーから JSON を受け取る
                .then(res => res.json())
                .then(data => {
                    // data.isCorrect が true なら → 「⭕」を表示
                    if (data.isCorrect) {
                        markSpan.textContent = "⭕";
                        markSpan.classList.add("correct");
                    } else {
                        // false なら → その選択肢に「❌」を表示
                        markSpan.textContent = "❌";
                        markSpan.classList.add("incorrect");

                        // 正解の選択肢に⭕（緑）を表示
                        document.querySelectorAll('.choice').forEach(otherBtn => {
                            if (otherBtn.dataset.answer === data.correctAnswer) {
                                let correctMark = otherBtn.parentElement
                                    .querySelector(
                                        '.mark');
                                correctMark.textContent = "⭕";
                                correctMark.classList.add("correct");
                            }
                        });
                    }
                });
        });
    });
    </script>
</body>

</html>