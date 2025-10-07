<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;  

class UserController extends Controller
{
    /**
    * ユーザー切り替えフォーム表示
    *
    * @return \Illuminate\View\View
    */

    public function switchForm()
    {
        $users = User::all(); 
        return view('users.switch', compact('users'));
    }

    /**
     * ログインユーザー切り替え処理
     *
     *  バリデーションルール
     * 登録済みユーザー
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse 
     */

    public function switch(Request $request)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);

        Auth::loginUsingId($request->user_id);

        return redirect()->route('dashboard')->with('success', 'ユーザーを切り替えました');
    }
}