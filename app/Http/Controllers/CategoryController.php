<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{    
    /** 
    * カテゴリ一覧をページネーション付き(10）で表示
    *
    * @return \Illuminate\View\View
    */ 
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     *カテゴリ新規作成用フォームを表示
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * カテゴリを新規作成して保存
     * 
     * バリデーションルール:
     * - name: 必須｜文字列｜最大255文字
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'カテゴリを追加しました');
    }
   
     /**
     * 編集用フォームを表示
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\View\View
    */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * カテゴリを更新
     * 
     * バリデーションルール:
     * -name: 必須｜文字列｜最大256文字
     * 
     * @param \Illuminate\Http\Request $request
     * @param　\App\Models\Category　$category
     * @return \Illuminate\Http\RedirectResponse   
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'カテゴリを更新しました');
    }
    /**
     * カテゴリを削除
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse 
    */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'カテゴリを削除しました');
    }
}