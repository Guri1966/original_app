<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;          
use App\Models\Word;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
     /**
     * ホーム画面を表示
     * ログイン中のユーザーが登録した単語一覧を取得して表示する。
     *
     * @return \Illuminate\View\View
     */
    
    public function home()
    {
        $words = Auth::user()->words;
        return view('home', compact('words'));
    }

    /** 単語一覧をページネーション付きで表示
    * hold_flag優先 → 英単語アルファベット順 → 作成日順で並べ替える。
    *
    * @return \Illuminate\View\View
    */ 
    
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

    /**  
     * 単語登録フォームを表示
     * ユーザーがカテゴリを選択できるように、全カテゴリーを取得する。
     *
     * @return \Illuminate\View\View
    */
    public function create()
    {
        $categories = Category::all();
        return view('words.create', compact('categories'));
    }

    /** 
     * 単語を新規登録
     * 
     * バリデーション後に画像を保存し、ログインユーザーに紐づけて登録する。
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

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

        // 画像がある場合はstorageに保存してパスを保持
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('images', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['hold_flag'] = $request->boolean('hold_flag');

        // ユーザーに紐づけて保存
        Auth::user()->words()->create($validated); 


        return redirect()->route('words.index')->with('success','単語を登録しました');
    }

    /** 
     * 単語編集フォームを表示
     *  
     * @param  App\Models\Word $word
     * @return \Illuminate\View\View
     */ 
    public function edit(Word $word)
    {
        $categories = Category::all();
        return view('words.edit', compact('word', 'categories'));
    }

    
   /**
    *  単語の更新処理
    *  入力値をバリデーション->空値を整形 ->画像保存->更新
    *   
    * @param \Illuminate\Http\Request $request
    * @param \App\Models\Word $word
    * @return \Illuminate\Http\RedirectResponse
    */
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
        'category_id' => 'nullable|exists:categories,id', // 存在チェックも追加すると安全
    ]);

    $data = $request->only([
        'english','onsetu','yomikata','imi','ruigo','iikae','category_id'
    ]);

    // 入力がなかったフィールドは空文字にしてDBの整合性を保つ
    foreach (['onsetu','yomikata','imi','ruigo','iikae'] as $field) {
        $data[$field] = $data[$field] ?? '';
    }

    if ($request->hasFile('image')) {
        $data['image_path'] = $request->file('image')->store('images', 'public');
    }

    $word->update($data);

    return redirect()->route('words.index')->with('success', '更新しました！');
}

    /**
     * 単語削除処理
     *  
     * @param \App\Models\Word $word
     * @return \Illuminate\Http\RedirectResponse
     */
    
    public function destroy(Word $word)
    {
        $word->delete();
        return redirect()->route('words.index')->with('success','削除しました！');
    }

    /**
     * ホールドフラグの更新
     * リクエストの内容をバリデーションし、データを保存する
     * バリデーションルール:
     * hold_flag: 必須 (required)、かつ boolean 値であること
     * 値を正しい型（boolean）に変換してから保存
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Word $word
     * @return \Illuminate\Http\RedirectResponse
     */

    public function hold(Request $request, Word $word)
    {
        $request->validate([
            'hold_flag' => 'required|boolean',
        ]);

        $word->update(['hold_flag' => $request->hold_flag]);
        return redirect()->route('words.index');
    }

    /**
     * クイズ画面を表示
     * 登録単語からランダムに問題を出題し、正答＋誤答を選択肢として生成する。
     * ※最低4語登録されていないとクイズ不可
     *
     * @return \Illuminate\View\View
     */  

    public function quiz()
{
    $words = Auth::user()->words;

    if ($words->count() < 4) {
        return view('words.quiz', compact('words'))
            ->with('error', '最低4語登録してください');
    }


        $question = $words->random();
        $correctAnswer = $question->imi;

        $wrongAnswers = $words->where('id', '!=', $question->id)
                              ->random(3)
                              ->pluck('imi');

        $choices = collect([$correctAnswer])->merge($wrongAnswers)->shuffle();

        return view('words.quiz', compact('question', 'choices', 'correctAnswer'));
    }

    /**
     * クイズの解答チェック（AJAX用）
     * 回答履歴を保存し、正答率を計算できるようにする。
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function check(Request $request)
    {
        // ログイン中ユーザーが登録した単語の中から、解答対象の単語を取得
        // 存在しない場合は 404 (Not Found) になる
        $word = Auth::user()->words()->findOrFail($request->word_id);

        // 回答回数を1回増やす
        $word->answer_count += 1;

        // ユーザーの回答($request->answer) と 正解($request->correctAnswer) を比較
        $isCorrect = $request->answer === $request->correctAnswer;

        // 正解だった場合は、正解数を1回増やす
        if ($isCorrect) {
            $word->correct_count += 1;
        }

        // 回答履歴（回答回数・正解数）を保存
        $word->save();

        // 結果をJSON形式で返す
        return response()->json([
            'isCorrect' => $isCorrect,                 // 正解かどうか（true/false）
            'correctAnswer' => $request->correctAnswer // 正解の答え
        ]);
    }

      /**
     * クイズ統計画面を表示
     * 各単語の正答率を計算し、正答率の低い順に並べて出力する。
     *
     * @return \Illuminate\View\View
     */
    
    public function stats()
    {
        $words = Auth::user()
                     ->words()
                     ->where('answer_count', '>', 0)
                     ->get()
                     ->sortBy(fn($w) => $w->correct_count / $w->answer_count);

        return view('words.quiz_stats', compact('words'));
    }
}