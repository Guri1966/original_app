<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    // ホーム画面（ユーザーの単語一覧）
    public function home()
    {
        $words = Auth::user()->words;
        return view('home', compact('words'));
    }

    // 単語一覧（ページネーション付き）
    public function index()
    {
        $words = Auth::user()->words()
            ->orderByDesc('hold_flag')
            ->orderBy('english')
            ->orderBy('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('words.index', compact('words'));
    }

    // 単語作成フォーム表示
    public function create()
    {
        $categories = Category::all();
        return view('words.create', compact('categories'));
    }

    // 単語登録処理
    public function store(Request $request)
    {
        $validated = $request->validate([
            'english'   => 'required|string|max:255',
            'onsetu'    => 'nullable|string|max:255',
            'yomikata'  => 'nullable|string|max:255',
            'imi'       => 'nullable|string|max:255',
            'ruigo'     => 'nullable|string|max:255',
            'iikae'     => 'nullable|string|max:255',
            'image'     => 'nullable|image|max:2048',
            'hold_flag' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('images', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['hold_flag'] = $request->boolean('hold_flag');

        Word::create($validated);

        return redirect()->route('words.index')->with('success','単語を登録しました');
    }

    // 編集フォーム表示
    public function edit(Word $word)
    {
        $categories = Category::all();
        return view('words.edit', compact('word', 'categories'));
    }

    // 単語更新処理
    public function update(Request $request, Word $word)
    {
        $request->validate([
            'english' => 'required|string',
            'onsetu' => 'nullable|string',
            'yomikata' => 'nullable|string',
            'imi' => 'nullable|string',
            'ruigo' => 'nullable|string',
            'iikae' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['english','onsetu','yomikata','imi','ruigo','iikae']);

        // 空の値は空文字に
        foreach (['onsetu','yomikata','imi','ruigo','iikae'] as $field) {
            $data[$field] = $data[$field] ?? '';
        }

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('images', 'public');
        }

        $word->update($data);

        return redirect()->route('words.index')->with('success', '更新しました！');
    }

    // 単語削除
    public function destroy(Word $word)
    {
        $word->delete();
        return redirect()->route('words.index')->with('success','削除しました！');
    }

    // ホールドフラグ更新
    public function hold(Request $request, Word $word)
    {
        $request->validate([
            'hold_flag' => 'required|boolean',
        ]);

        $word->update(['hold_flag' => $request->hold_flag]);
        return redirect()->route('words.index');
    }

    // クイズ画面表示
    public function quiz()
    {
        $words = Word::all();

        if ($words->count() < 4) {
            return back()->with('error', '最低4語登録してください');
        }

        $question = $words->random();
        $correctAnswer = $question->imi;

        $wrongAnswers = $words->where('id', '!=', $question->id)
                              ->random(3)
                              ->pluck('imi');

        $choices = collect([$correctAnswer])->merge($wrongAnswers)->shuffle();

        return view('words.quiz', compact('question', 'choices', 'correctAnswer'));
    }

    // クイズ解答チェック（AJAX用）
    public function check(Request $request)
    {
        $word = Word::findOrFail($request->word_id);

        $word->answer_count += 1;
        $isCorrect = $request->answer === $request->correctAnswer;
        if ($isCorrect) $word->correct_count += 1;
        $word->save();

        return response()->json([
            'isCorrect' => $isCorrect,
            'correctAnswer' => $request->correctAnswer,
        ]);
    }

    // クイズ統計表示
    public function stats()
    {
        $words = Word::where('answer_count', '>', 0)
                     ->get()
                     ->sortBy(fn($w) => $w->correct_count / $w->answer_count);

        return view('words.quiz_stats', compact('words'));
    }
}