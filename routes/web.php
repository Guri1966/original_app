<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 誰でもアクセス可能なルート（必要であれば）
Route::get('/', function () {
    return view('welcome');
});

// 認証が必要なルート
Route::middleware('auth')->group(function () {
    
    // プロフィール関連
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // 英単語関連（Controllerをグループ化して記述をスッキリさせる）
    Route::controller(WordController::class)->group(function () {
        Route::get('/words/quiz', 'showQuiz')->name('words.quiz');
        Route::post('/quiz/check', 'checkAnswer')->name('words.quiz.check');
        Route::get('/quiz/stats', 'showStats')->name('words.quiz.stats');
        Route::get('/home', 'showHome')->name('words.home');
        Route::patch('/words/{word}/hold', 'toggleHold')->name('words.toggle-hold');
    });

    // CRUD（Resourceを一箇所にまとめる）
    Route::resource('words', WordController::class)->except(['show']);
 

    // 「管理者だけ」が使える機能
Route::middleware('can:admin-only')->group(function () {
     
    Route::resource('categories', CategoryController::class);  // <- 管理者のみに設定したい
       
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/switch', [UserController::class, 'switchForm'])->name('switch.form');
        Route::post('/switch', [UserController::class, 'switch'])->name('switch');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        });
    });
});

// ダッシュボード
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';