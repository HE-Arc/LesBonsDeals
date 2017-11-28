<?php

use Illuminate\Database\Seeder;

use App\Picture;
use App\Article;

class PictureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article = Article::find(2);

        $picture1 = new Picture([
            'path' => "/images/articles/1/1_1.jpg"
        ]);

        $picture2 = new Picture([
            'path' => "images/articles/1/1_2.jpg"
        ]);

        $picture1->article()->associate($article);
        $picture1->save();

        $picture2->article()->associate($article);
        $picture2->save();


        $picture1 = new Picture([
            'path' => "/images/articles/2/2_0.jpg"
        ]);

        $picture2 = new Picture([
            'path' => "images/articles/2/2_1.jpg"
        ]);


        $article = Article::find(1);
        $picture1->article()->associate($article);
        $picture1->save();

        $picture2->article()->associate($article);
        $picture2->save();

    }
}
