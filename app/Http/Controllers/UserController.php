<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        $articles = Article::where('user_id', $user->id)->get();

        $num_views = 0;
        foreach ($articles as $article) {
            $num_views += $article->number_of_view;
        }

        return view('users.user', [
            'username' => $user->username,
            'city' => $user->city,
            'zip_code' => $user->zip_code,
            'num_view' => $num_views,
            'articles' => $articles
        ]);
    }
}
