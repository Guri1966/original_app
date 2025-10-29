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
    Route::get('/words/quiz', [WordController::class, 'showQuiz'])->name('showQuiz');
    Route::post('/quiz/check', [WordController::class, 'checkAnswer'])->name('checkAnswer');
    Route::get('/quiz/stats', [WordController::class, 'showStats'])->name('showStats');

    // 単語帳ホーム
    Route::get('/home', [WordController::class, 'showHome'])->name('showHome');

    // 単語のCRUD（createも含まれるので別途定義は不要）
    Route::resource('words', WordController::class)->except(['show']);

    // toggleHold専用ルート
    Route::patch('/words/{word}/hold', [WordController::class, 'toggleHold'])->name('toggleHold');

    // カテゴリ関連
    Route::resource('categories', CategoryController::class);
});


//ユーザ切り替え管理
Route::get('/users/switch', [UserController::class,'switchForm'])
->name('users.switch.form');

Route::post('/users/switch', [UserController::class,'switch'])
->name('users.switch');

//新規ユーザー登録画面表示
Route::get('/users/create', [UserController::class, 'create'])
    ->name('users.create');

//新規ユーザー登録
Route::post('/users', [UserController::class,'store'])
->name('users.store');
    

// ダッシュボード
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 認証関連ルートを読み込む（login / register / logout など）
require __DIR__.'/auth.php';