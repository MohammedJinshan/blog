<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function tag()
    {
        $tags = Tag::with('article')->get();
        $articles = Article::get();
        return view('tag.tag',compact('tags','articles'));
    }
    public function addtag(Request $request)
    {
        $tag = new Tag();
        $tag->id = $request->id;
        $tag->title = $request->title;
        $tag->article_id = $request->article_id;
        $tag->save();
        return redirect()->back();
    }
    public function deletetag($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->back();
    }
    public function edittag(Request $request)
    {
        $tag = Tag::where('id',$request->id)->first();
        $tag->title = $request->title;
        $tag->article_id = $request->article_id;
        $tag->save();
        return redirect()->back();
    }
}
