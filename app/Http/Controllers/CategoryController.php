<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::with('article')->get();
        $articles = Article::get();
        return view('category.category',compact('categories','articles'));
    }
    public function addcategory(Request $request)
    {
        $category = new Category();
        $category->id = $request->id;
        $category->article_category_id = $request->article_category_id;
        $category->title = $request->title;
        $category->save();
        return redirect()->back();
    }
    public function deletecategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }
    public function editcategory(Request $request)
    {
        $category = Category::where('id',$request->id)->first();
        $category->title = $request->title;
        $category->article_category_id = $request->article_category_id;
        $category->save();
        return redirect()->back();
    }
}
