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
        // All method will be executed only if the user is signed in.
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
        return view('home.personal', ['user' => $user]);
    }

    public function settings()
    {
        return view('home.manage');
    }

    public function manageArticles()
    {
        //Get all articles of the current user
        $user = Auth::user();
        $articles = $user->articles;

        return view('home.articles', ['articles' => $articles]);
    }

    public function sellArticle()
    {
        $categories = Category::all();

        return view('article.create', compact('categories'));
    }

    public function updateUserInfo(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'name' => $request->input_name,
            'firstname' => $request->input_firstname,
            'city' => $request->input_city,
            'zip_code' => $request->input_zip_code,
            'address' => $request->input_street,
            'country' => $request->input_country,
            'phone_number' => $request->input_phone
        ]);

        return back();
    }
}
