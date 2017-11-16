<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Category;
use App\User;


class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $category = Category::where("title", "Informatique")->first();

        $article = new Article([
            'title' => 'Samsung Galaxy S6',
            'price' => 600.0,
            'description' => 'This is the description of the Samsung Galaxy s6',
            'quantity' => '1',
        ]);

        $article->category()->associate($category);
        $article->user()->associate($user);
        $article->save();

        $article = new Article([
            'title' => 'Iphone 7',
            'price' => 800.0,
            'description' => "I'm pro apple that's why I'm selling this",
            'quantity' => '1',
        ]);

        $article->category()->associate($category);
        $article->user()->associate($user);
        $article->save();

        $article = new Article([
            'title' => 'Iphone 7',
            'price' => 800.0,
            'description' => "I'm pro apple that's why I'm selling this",
            'quantity' => '1',
        ]);

        $article->category()->associate($category);
        $article->user()->associate($user);
        $article->save();

        $article = new Article([
            'title' => 'Iphone 7',
            'price' => 800.0,
            'description' => "I'm pro apple that's why I'm selling this",
            'quantity' => '1',
        ]);

        $article->category()->associate($category);
        $article->user()->associate($user);
        $article->save();

        $article = new Article([
            'title' => 'Iphone 7',
            'price' => 800.0,
            'description' => "I'm pro apple that's why I'm selling this",
            'quantity' => '1',
        ]);

        $article->category()->associate($category);
        $article->user()->associate($user);
        $article->save();

        $article = new Article([
            'title' => 'Iphone 7',
            'price' => 800.0,
            'description' => "I'm pro apple that's why I'm selling this",
            'quantity' => '1',
        ]);

        $article->category()->associate($category);
        $article->user()->associate($user);
        $article->save();

        $article = new Article([
            'title' => 'Iphone 7',
            'price' => 800.0,
            'description' => "I'm pro apple that's why I'm selling this",
            'quantity' => '1',
        ]);

        $article->category()->associate($category);
        $article->user()->associate($user);
        $article->save();

    }
}
