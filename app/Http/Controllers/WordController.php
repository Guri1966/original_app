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

    return redirect()->route('home')->with('success', '単語を追加しました！');
}
 

}