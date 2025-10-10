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