document.addEventListener("DOMContentLoaded", () => {
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

    document.getElementById("prev-btn").addEventListener("click", function () {
        currentIndex = (currentIndex - 1 + words.length) % words.length;
        updateWord(currentIndex);
    });

    document.getElementById("next-btn").addEventListener("click", function () {
        currentIndex = (currentIndex + 1) % words.length;
        updateWord(currentIndex);
    });
});