<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\Picture;
use Illuminate\Http\Request;

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

            $articlesMostViewed = Article::where('category_id', $category_id->id)->orderBy('number_of_view', 'desc')->limit(15)->get();
            $latestArticles = Article::where('category_id', $category_id->id)->latest()->limit(15)->get();

        } else {
            $articlesMostViewed = Article::orderBy('number_of_view', 'desc')->limit(15)->get();
            $latestArticles = Article::latest()->limit(15)->get();
        }

        return view('index', [
            'latestArticles' => $latestArticles,
            'articlesMostViewed' => $articlesMostViewed,
        ]);
    }

    public function find(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::where('title', 'like', "%$query%")->get();
        return view('search.articles', ['articles' => $articles]);
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();

        return view('article.edit', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $this->validate(request(), [
            'title' => 'required|min:1|max:30',
            'description' => 'required|max:512',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|min:1|max:10000',
            'category' => 'required'
        ]);

        $category = Category::where('title', request('category'))->firstOrFail();

        $article = Article::findOrFail($id);
        $article->title = request('title');
        $article->description = request('description');
        $article->price = request('price');
        $article->quantity = request('quantity');
        $article->category()->associate($category);
        $article->save();

        return redirect()->route('home');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('article', [
            'article' => $article,
            'comments' => $article->comments
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('article.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:1|max:30',
            'description' => 'required|max:512',
            'price' => 'required|min:0',
            'quantity' => 'required|min:1|max:10000',
            'category' => 'required'
        ]);

        $category = Category::where('title', request('category'))->firstOrFail();
        $user = auth()->user();

        $article = new Article([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'number_of_view' => 0
        ]);

        $article->user()->associate($user);
        $article->category()->associate($category);
        $article->save();

        foreach ($request->image as $image) {
            $filename = $image->store('images/articles');

            $newImage = new Picture([
                'path' => $filename
            ]);

            $newImage->article()->associate($article);
            $newImage->save();
        }

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('manage_articles');
    }
}
