<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function getIndex()
    {
        $articles = Article::all();
        return view('index', ['articles' => $articles]);
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('article', ['article' => $article]);
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        //TODO: redirect to the correct page...
        return redirect()->route('index')->with('info','Article deleted');
    }

    public function addArticle(){
        $category = Category::find(1);
        $user = User::find(1);
        //$category = Category::where("title","Informatique")->first();

        $article = new Article([
            'title' => 'Samsung Galaxy S6',
            'price' => 600.0,
            'quantity' => '1',
            'number_of_view' => 0,
        ]);

        //$article->category()->associate($category);
        //$article->user()->associate($user);
        //$article->save();

        $article->category()->save($category);
    }
}
