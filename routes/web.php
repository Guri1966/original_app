<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// プロフィール関連
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//英単語クイズ関連
    Route::get('/words/quiz', [WordController::class, 'quiz'])->name('quiz');
    Route::post('/quiz/check', [WordController::class, 'check'])->name('quiz.check');
    Route::get('/quiz/stats', [WordController::class, 'stats'])->name('quiz.stats');
 // 単語帳ホーム
Route::get('/home', [WordController::class, 'home'])->name('home');

// 単語登録フォーム
Route::get('/resist', function () {
return view('resist');
})->name('resist');

// 単語のCRUDをまとめて定義
Route::resource('words', WordController::class)->except(['show']);

// hold専用ルート（resourceには含まれないので追加）
Route::patch('/words/{word}/hold', [WordController::class, 'hold'])->name('words.hold');

});

// ダッシュボード
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';