<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/learn', function () {
    return view('learn');
})->name('learn');

//単語帳へ
Route::get('/home', [WordController::class, 'home'])->middleware('auth')->name('home');
//単語登録フォームへ
Route::get('/resist', function(){
    return view('regist');
    })->name('regist');
//単語の登録
Route::post('/words', [WordController::class, 'store'])->middleware('auth')->name('words.store');
//登録単語の一覧表示
Route::get('/words', [WordController::class, 'index'])->middleware('auth')->name('words.index');
// 編集ページと削除処理
Route::get('/words/{word}/edit', [WordController::class, 'edit'])->name('words.edit');
Route::put('/words/{word}', [WordController::class, 'update'])->name('words.update');
Route::delete('/words/{word}', [WordController::class, 'destroy'])->name('words.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';