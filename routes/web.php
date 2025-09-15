<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 認証が必要なルート
Route::middleware('auth')->group(function () {
    // プロフィール関連
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 英単語クイズ関連
    Route::get('/words/quiz', [WordController::class, 'quiz'])->name('quiz');
    Route::post('/quiz/check', [WordController::class, 'check'])->name('quiz.check');
    Route::get('/quiz/stats', [WordController::class, 'stats'])->name('quiz.stats');

    // 単語帳ホーム
    Route::get('/home', [WordController::class, 'home'])->name('home');

    // 単語のCRUD（createも含まれるので別途定義は不要）
    Route::resource('words', WordController::class)->except(['show']);

    // hold専用ルート
    Route::patch('/words/{word}/hold', [WordController::class, 'hold'])->name('words.hold');

    // カテゴリ
    Route::resource('categories', CategoryController::class);
});

//ユーザ切り替え管理
Route::get('/users/switch', [UserController::class,'switchForm'])
->name('users.switch.form');

Route::post('/users/switch', [UserController::class,'switchForm'])
->name('users.switch');
    

// ダッシュボード
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 認証関連ルートを読み込む（login / register / logout など）
require __DIR__.'/auth.php';