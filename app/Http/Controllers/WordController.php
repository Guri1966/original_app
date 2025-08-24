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
    $words = Word::where('user_id', Auth::id())
        ->orderByDesc('hold_flag') //フラグ１のものを上に
        ->orderBy('english' ,'asc') //
        ->orderBy('created_at' , 'asc')
        ->get();
        
    return view('words.index', compact('words'));
}

public function store(Request $request)  //単語新規登録
{    
    $validated = $request->validate([
        'english' => 'required|string|max:255', // ★ 追加
        'yomikata' => 'required|string|max:255',
        'imi' => 'required|string|max:255',
        'ruigo' => 'nullable|string|max:255',
        'iikae' => 'nullable|string|max:255',
        'image_path' => 'nullable|image|max:2048',
        'hold_flag' => 'required|boolean',
    ]);

    // 画像ファイルがあれば保存
    if ($request->hasFile('image_path')) {
        // storage/app/public/images に保存
        $path = $request->file('image_path')->store('images', 'public');
        $validated['image_path'] = $path;
    }

    $validated['user_id'] = Auth::id();
    $validated['image_path'] = $path;
    $validated['hold_flag']  = $request->boolean('hold_flag'); 
        
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
    $word->update([
        'english' => $request->english,
        'yomikata' => $request->yomikata,
        'imi' => $request->imi,
        'ruigo' => $request->ruigo,
        'iikae' => $request->iikae,
        
    ]);
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

public function flashcards()
{
    $words = Auth::user()->words()->get(); // ユーザーの単語を全部取得
    return view('words.flashcards', compact('words'));
}

}