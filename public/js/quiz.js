document.addEventListener("DOMContentLoaded", () => {
    const config = window.quizConfig;
    if (!config) {
        console.error("quizConfig が定義されていません");
        return;
    }


    document.querySelectorAll('.choice').forEach(btn => {
        btn.addEventListener('click', () => {
            const answer = btn.dataset.answer;
            const correct = btn.dataset.correct;
            const wordId = btn.dataset.wordId;
            const markSpan = btn.parentElement.querySelector('.mark');

            // マークリセット
            document.querySelectorAll('.mark').forEach(m => {
                m.textContent = "";
                m.className = "mark";
            });

            // LaravelにPOST送信
            fetch(config.url, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": config.csrf,
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    word_id: wordId,
                    answer: answer,
                    correctAnswer: correct
                })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.isCorrect) {
                        markSpan.textContent = "⭕";
                        markSpan.classList.add("correct");
                    } else {
                        markSpan.textContent = "❌";
                        markSpan.classList.add("incorrect");

                        document.querySelectorAll('.choice').forEach(otherBtn => {
                            if (otherBtn.dataset.answer === data.correctAnswer) {
                                let correctMark = otherBtn.parentElement.querySelector('.mark');
                                correctMark.textContent = "⭕";
                                correctMark.classList.add("correct");
                            }
                        });
                    }
                })
                .catch(err => console.error("通信エラー:", err));
        });
    });
});
