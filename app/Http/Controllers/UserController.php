<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ユーザー切り替えフォーム表示
    public function switchForm()
    {
        $users = User::all(); // 必要に応じて制限
        return view('users.switch', compact('users'));
    }

    // ユーザー切り替え処理
    public function switch(Request $request)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);

        Auth::loginUsingId($request->user_id);

        return redirect()->route('dashboard')->with('success', 'ユーザーを切り替えました');
    }
}