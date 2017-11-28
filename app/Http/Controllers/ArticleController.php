<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function getIndex()
    {

        //get the menu items
        $categories = Category::orderBy('title')->get();

        //get latest/most viewed articles
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
            $category_id = Category::where('title', $category)->first(['id']);
            $articlesMostViewed = Article::where('category_id',$category_id->id)->orderBy('number_of_view', 'desc')->get();
            $latestArticles = Article::where('category_id',$category_id->id)->latest()->limit(4)->get();
        } else {
            $articlesMostViewed = Article::orderBy('number_of_view', 'desc')->get();
            $latestArticles = Article::latest()->limit(4)->get();
        }

        return view('index', [
            'latestArticles' => $latestArticles,
            'articlesMostViewed' => $articlesMostViewed,
            'categories' => $categories
        ]);
    }

    public function find(Request $request)
    {
        $name = $request->input('name');
        //$articles = Article::find($name);
        $articles = Article::where('title', 'like', "%$name%")->get();
        return view('search.articles', ['articles' => $articles]);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('article.edit', ['article' => $article]);
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('article', [
            'article' => $article,
            'comments' => $article->comments
        ]);
    }

    public function create()
    {

    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|min:1|max:30',
            'description' => 'required|max:512',
            'price' => 'required|min:0',
            'quantity' => 'required|min:1|max:10000',
            'category' => 'required'
        ]);

        $category = Category::where('title', request('category'))->get();

        Article::create([
            'title' => request('title'),
            'description' => request('description'),
            'price' => request('price'),
            'quantity' => request('quantity'),
            'user_id' => auth()->id(),
            'category_id' => $category->first()->id,
            'number_of_view' => 0
        ]);

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        //$article = Article::find($id);
        //$article->delete();
        //TODO: redirect to the correct page...
        //return redirect()->route('index')->with('info','Article deleted');
        return "hello";
    }

    public function addArticle()
    {
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
