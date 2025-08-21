@include('layouts.header')
@section('content')
<div class="max-w-md mx-auto py-8 px-4">
    <h1 class="text-xl font-bold mb-4 text-center">カード学習</h1>

    <div id="card" class="border rounded-lg p-6 shadow text-center min-h-[160px] flex flex-col justify-center">
        <!-- JSで中身を差し替えます -->
    </div>

    <div class="mt-4 flex items-center justify-between">
        <button id="prevBtn" class="px-4 py-2 border rounded disabled:opacity-40">← 前へ</button>
        <div class="text-sm text-gray-500">
            <span id="counter">0 / 0</span>
        </div>
        <button id="nextBtn" class="px-4 py-2 border rounded disabled:opacity-40">次へ →</button>
    </div>

    <div class="mt-3 text-center">
        <button id="shuffleBtn" class="text-xs underline">ランダム順にする</button>
    </div>
</div>

<script>
// PHPのコレクションをそのままJS配列へ
const words = @json($words);

let i = 0;

const card = document.getElementById('card');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const shuffleBtn = document.getElementById('shuffleBtn');
const counter = document.getElementById('counter');

function esc(s) {
    return String(s ?? '').replace(/[&<>"']/g, m => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    } [m]));
}

function render() {
    if (!words.length) {
        card.innerHTML = '<p>単語がありません。まず登録してください。</p>';
        prevBtn.disabled = true;
        nextBtn.disabled = true;
        counter.textContent = '0 / 0';
        return;
    }
    const w = words[i];
    card.innerHTML = `
            <div class="text-2xl font-semibold">${esc(w.english)}</div>
            ${w.yomikata ? `<div class="mt-2">${esc(w.yomikata)}</div>` : ''}
            ${w.meaning  ? `<div class="mt-3 text-sm opacity-80">${esc(w.meaning)}</div>` : ''}
        `;
    prevBtn.disabled = (i === 0);
    nextBtn.disabled = (i === words.length - 1);
    counter.textContent = (i + 1) + ' / ' + words.length;
}

function shuffle(arr) {
    for (let j = arr.length - 1; j > 0; j--) {
        const k = Math.floor(Math.random() * (j + 1));
        [arr[j], arr[k]] = [arr[k], arr[j]];
    }
}

prevBtn.addEventListener('click', () => {
    if (i > 0) {
        i--;
        render();
    }
});
nextBtn.addEventListener('click', () => {
    if (i < words.length - 1) {
        i++;
        render();
    }
});
shuffleBtn.addEventListener('click', () => {
    shuffle(words);
    i = 0;
    render();
});

// キーボード操作（左右キー）
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') prevBtn.click();
    if (e.key === 'ArrowRight') nextBtn.click();
});

render();
</script>
@endsection