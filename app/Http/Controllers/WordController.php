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
    $words = Auth::user()->words;
    return view('words.index', compact('words'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'english' => 'required|string|max:255', // ★ 追加
        'yomikata' => 'required|string|max:255',
        'imi' => 'required|string|max:255',
        'ruigo' => 'nullable|string|max:255',
        'iikae' => 'nullable|string|max:255',
    ]);

    $validated['user_id'] = Auth::id();
    Word::create($validated);

    return redirect('/resist');
}

public function getEdit($edit_id)
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


public function destroy(Request $request) {
    $delete_id = $request->delete_id;
    $words = Word::find($delete_id);
    $words->delete();
    return redirect()->route('words.index')->with('success','削除しました！');
}

}