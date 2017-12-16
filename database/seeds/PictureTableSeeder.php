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
        $this->savePicture(1, "1/1_1.jpg");
        $this->savePicture(1, "1/1_2.jpg");
        $this->savePicture(1, "1/1_3.jpg");
        $this->savePicture(2, "2/2_0.jpg");
        $this->savePicture(2, "2/2_1.jpg");
        $this->savePicture(3, "3/3_1.jpg");
        $this->savePicture(3, "3/3_2.jpg");
        $this->savePicture(4, "4/4_1.jpg");
        $this->savePicture(4, "4/4_2.jpg");
        $this->savePicture(5, "5/5_0.jpg");
        $this->savePicture(6, "6/6_1.jpg");
        $this->savePicture(6, "6/6_2.jpg");
        $this->savePicture(6, "6/6_3.jpg");
        $this->savePicture(7, "7/7_1.jpg");
        $this->savePicture(8, "8/8_1.jpg");
        $this->savePicture(9, "9/9_0.jpg");
        $this->savePicture(10, "10/10_1.jpg");
    }

    public function savePicture($articleID, $path)
    {
        $article = Article::find($articleID);
        $picture = new Picture([
            'path' => $path
        ]);
        $picture->article()->associate($article);
        $picture->save();
    }
}
