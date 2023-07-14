<?php

namespace App\Http\Controllers;

use App\Models\Aricle;
use Illuminate\Http\Request;

class AricleController extends Controller
{
    public function article()
    {
        $articles = Aricle::get();
        return view('article.article',compact('articles'));
    }
    public function addarticle(Request $request)
    {
        $article = new Aricle();
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

        return redirect()->back();
    }
    public function deletearticle($id)
    {
        $article = Aricle::find($id);
        $article->delete();
        return redirect()->back();
    }
    public function editarticle(Request $request)
    {
        $article = Aricle::where('id',$request->id)->first();
        $article->name = $request->name;
        $article->latitude = $request->latitude;
        $article->longitude = $request->longitude;
        $article->is_active = $request->is_active;
        $article->delivery_charge = $request->delivery_charge;
        $article->radius = $request->radius;
        $article->save();
        return redirect()->back();
    }
}
