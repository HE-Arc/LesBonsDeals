<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class ArticleController extends Controller
{
    public function getIndex()
    {
        //get most viewed articles
        $articlesMostViewed = Article::orderBy('number_of_view','desc')->get();
        //get latest articles
        $latestArticles = Article::latest()->limit(4)->get();

        //get the menu items
        $categories = Category::orderBy('title')->get();

        return view('index', [
            'latestArticles' => $latestArticles,
            'articlesMostViewed' => $articlesMostViewed,
            'categories' => $categories
            ]);
    }

    public function find($name){

    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('article', ['article' => $article]);
    }

    public function create()
    {
        return "ArticleController: created function()";
    }

    public function store()
    {

    }

    public function destroy($id)
    {
        //$article = Article::find($id);
        //$article->delete();
        //TODO: redirect to the correct page...
        //return redirect()->route('index')->with('info','Article deleted');
        return "hello";
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
