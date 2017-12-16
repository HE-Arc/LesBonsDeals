<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Picture;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit', 'update', 'store', 'destroy']]);
    }

    public function getIndex()
    {
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

    public function inc_view($article)
    {
        $article->number_of_view += 1;
        $article->save();
    }

    public function find(Request $request)
    {
        $request->validate([
            'category' => 'integer',
            'max_price' => 'numeric|min:0',
            'min_price' => 'numeric|min:0'
        ]);

        $name = $request->input('name');
        $cat = $request->input('category');
        $max_price = $request->input('max_price');
        $min_price = $request->input('min_price');

        $filters = [['title', 'like', "%$name%"]];
        if (isset($cat) and $cat > -1)
            $filters[] = ['category_id', $cat];
        if (isset($max_price))
            $filters[] = ['price', '<', $max_price];
        if (isset($min_price))
            $filters[] = ['price', '>', $min_price];
        $articles = Article::where($filters)->paginate(20);
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
        $articleRequest = new ArticleRequest();
        $this->validate(request(), $articleRequest->rules());

        $article = Article::findOrFail($id);
        $article->title = request('title');
        $article->description = request('description');
        $article->price = request('price');
        $article->quantity = request('quantity');
        $article->category_id = request('category');
        $article->save();

        return redirect()->route('manage_articles')->with('status', 'Article mis à jour !');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        $this->inc_view($article);

        return view('article', [
            'article' => $article,
            'comments' => $article->comments
        ]);
    }

    public function create()
    {
        if (Auth::guest())
            return redirect('');
        $categories = Category::all();

        return view('article.create', compact('categories'));
    }

    public function store(ArticleRequest $request)
    {
        $user = auth()->user();

        $article = new Article([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category' => $request->category_id,
            'number_of_view' => 0
        ]);

        $article->user()->associate($user);
        $article->save();

        if (!empty($request->image)) {
            //Create folder to store the image

            if (!file_exists('images/articles/' . $article->id)) {
                mkdir('images/articles/' . $article->id, 0664, true);
            }

            foreach ($request->image as $image) {
                $storagePath = Storage::disk('articles')->put($article->id, $image);

                $newImage = new Picture([
                    'path' => $storagePath
                ]);

                $newImage->article()->associate($article);
                $newImage->save();
            }
        }

        return redirect()->route('manage_articles')->with('status', 'Article mis en vente !');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $images = Picture::where('article_id', $article->id)->get();

        foreach ($images as $image) {
            Storage::disk('articles')->delete($image->path);
        }

        $article->delete();

        return redirect()->route('manage_articles')->with('status', 'Article supprimé !');
    }
}
