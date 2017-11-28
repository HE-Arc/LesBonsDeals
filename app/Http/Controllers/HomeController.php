<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('home.personal',['user'=>$user]);
    }

    public function settings(){
        return view('home.manage');
    }

    public function manageArticles(){
        //Get all articles of the current user
        $user = Auth::user();
        $articles = $user->articles;

        return view('home.articles',['articles'=> $articles]);
    }

    public function sellArticle(){
        $categories = Category::all();

        return view('article.create', compact('categories'));
    }
}
