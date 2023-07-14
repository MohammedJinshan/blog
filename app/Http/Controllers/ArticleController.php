<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function article()
    {
        $articles = Article::get();
        return view('article.article',compact('articles'));
    }
    public function addarticle(Request $request)
    {
        $article = new Article();
        $article->id = $request->id;
        $article->title = $request->title;
        $article->description = $request->description;
        if ($request->image) {
            $image_var = $request->file('image');
            $name = $image_var->getClientOriginalName();
            $filename = time() . '.' . $name;
            $image_var->move(public_path('/article/'), $filename);
            $article->image = '/article/' . $filename;
        }
        $article->save();
        return redirect()->back();
    }
    public function deletearticle($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->back();
    }
    public function editarticle(Request $request)
    {
        $article = Article::where('id',$request->id)->first();
        $article->id = $request->id;
        $article->title = $request->title;
        $article->description = $request->description;
        if ($request->image) {
            $image_var = $request->file('image');
            $name = $image_var->getClientOriginalName();
            $filename = time() . '.' . $name;
            $image_var->move(public_path('/article/'), $filename);
            $article->image = '/article/' . $filename;
        }
        $article->save();
        return redirect()->back();
    }

    public function viewHome()
    {
        $articles = Article::get();
        $categories = Category::with('article')->get();
        $tags = Tag::with('article')->get();
        return view('homepage.homepage',compact('articles','categories','tags'));
    }
}
