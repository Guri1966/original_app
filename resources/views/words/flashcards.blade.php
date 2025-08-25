<!-- resources/views/words/flashcards.blade.php -->
@include('layouts.header')

@section('content')
<div id="flashcard" class="card">
    <h2 id="english"></h2>
    <p id="yomikata"></p>
</div>

<div class="buttons">
    <button id="prevBtn">← 前へ</button>
    <button id="nextBtn">次へ →</button>
</div>

<script>
// PHPから渡されたデータをJavaScript用に変換
const words = @json($words);

let currentIndex = 0;

function showWord(index) {
    if (words.length === 0) {
        document.getElementById("english").innerText = "単語がありません";
        document.getElementById("yomikata").innerText = "";
        return;
    }

    document.getElementById("english").innerText = words[index].english;
    document.getElementById("yomikata").innerText = words[index].yomikata;
}

// 初期表示
showWord(currentIndex);

// ボタンイベント
document.getElementById("prevBtn").addEventListener("click", () => {
    if (currentIndex > 0) {
        currentIndex--;
        showWord(currentIndex);
    }
});

document.getElementById("nextBtn").addEventListener("click", () => {
    if (currentIndex < words.length - 1) {
        currentIndex++;
        showWord(currentIndex);
    }
});
</script>
@endsection