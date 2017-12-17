<?php

use Illuminate\Database\Seeder;

use App\Comment;
use App\Article;
use App\User;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(2);
        $article = Article::find(1);

        $comment = new Comment([
            'comment' => 'Est-ce que la batterie se décharge rapidement?'
        ]);

        $comment->article()->associate($article);
        $comment->user()->associate($user);
        $comment->save();


        $user = User::find(1);
        $article = Article::find(1);

        $comment = new Comment([
            'comment' => "Je tiens 5 jours d'affilés sans le recharger ;-)"
        ]);

        $comment->article()->associate($article);
        $comment->user()->associate($user);
        $comment->save();
    }
}
