<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    public function home()
{
    $words = Auth::user()->words;
    return view('home', compact('words'));
}


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


//単語登録
public function store(Request $request)
{    
    $validated = $request->validate([
        'english'   => 'required|string|max:255',
        'onsetu'    => 'requierd|string|max:255',
        'yomikata'  => 'required|string|max:255',
        'imi'       => 'required|string|max:255',
        'ruigo'     => 'nullable|string|max:255',
        'iikae'     => 'nullable|string|max:255',
        'image_path'=> 'nullable|image|max:2048',
        'hold_flag' => 'required|boolean',
    ]);
  
    $validated['image_path'] = $request->hasFile('image')
    ? $request->file('image')->store('images', 'public')
    : null;

// $validated に 'image' が残るとINSERTで未知カラムになるので除去
    unset($validated['image']);

    $validated['user_id']   = Auth::id();
    $validated['hold_flag'] = $request->boolean('hold_flag'); 
        
    Word::create($validated);

    return redirect()->route('words.index')->with('success','単語を登録しました');
}


public function edit($edit_id)
{
    $word_info = Word::find($edit_id);
    return view('words.edit')
    ->with('word_info' , $word_info);

}


public function update(Request $request, Word $word)
{
    // 入力値を配列にまとめる
    $data = $request->only(['english','onsetu','yomikata','imi','ruigo','iikae']);

    // もし新しい画像がアップロードされたら保存
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public'); 
        $data['image_path'] = $path;
    }

    // DB更新
    $word->update($data);

    return redirect()
        ->route('words.index')
        ->with('success', '更新しました！');
}

public function destroy(Word $word)
{
    $word->delete();
    return redirect()->route('words.index')->with('success','削除しました！');
}

public function hold(Request $request , Word $word)
{
    $request->validate([
        'hold_flag' => 'required|boolean',

    ]);
    $word->update([
        'hold_flag'=>$request->hold_flag,
    ]);
    
    return redirect() -> route('words.index');
}

public function quiz()
{
    // 登録単語を全部取得
    $words = Word::all();

    if ($words->count() < 4) {
        return back()->with('error', '最低4語登録してください');
    }

    // ランダムで1問選ぶ
    $question = $words->random();

    // 正解の日本語訳
    $correctAnswer = $question->imi;

    // 不正解の候補（正解を除いた中からランダムに3つ）
    $wrongAnswers = $words->where('id', '!=', $question->id)
                          ->random(3)
                          ->pluck('imi');

    // 選択肢をシャッフル
    $choices = collect([$correctAnswer])->merge($wrongAnswers)->shuffle();

    return view('/words.quiz', compact('question', 'choices', 'correctAnswer'));
}

public function check(Request $request)
{
    $word = Word::findOrFail($request->word_id);

    // 出題回数をカウント
    $word->answer_count += 1;

    $isCorrect = $request->answer === $request->correctAnswer;

    if ($isCorrect) {
        $word->correct_count += 1;
    }

    $word->save();

    return response()->json([
        'isCorrect' => $isCorrect,
        'correctAnswer' => $request->correctAnswer,
    ]);
}

public function stats()
{
    // 正解率 = correct_count / answer_count
    $words = Word::select('*')
        ->where('answer_count', '>', 0)
        ->get()
        ->sortBy(function($w) {
            return $w->correct_count / $w->answer_count;
        });

    return view('/words.quiz_stats', compact('words'));
}

}