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
        //***********************//
        //  Articles from user 1 //
        //***********************//

        $user = User::find(1);
        $category = Category::where("title", "Informatique")->first();

        $article = new Article([
            'title' => 'Iphone 7',
            'price' => 700.0,
            'description' => "Je déteste apple et ma femme n'a rien eu de mieux à faire que de m'en offrir un pour Noël...",
            'quantity' => '1',
        ]);
        $this->addArticle($article,$category, $user);

        $article = new Article([
            'title' => 'Samsung Galaxy S6',
            'price' => 300.0,
            'description' => "Je vends ce natel car je viens d'en recevoir un nouveau comme cadeau.",
            'quantity' => '1',
        ]);
        $this->addArticle($article,$category, $user);


        $article = new Article([
            'title' => 'Apple Mac MacBook Pro',
            'price' => 1199.0,
            'description' => "Je suis un grand gamer, autant vous dire qu'il ne me sert à pas grand chose.",
            'quantity' => '1',
        ]);
        $this->addArticle($article,$category, $user);

        $article = new Article([
            'title' => 'GTX 690',
            'price' => 240.0,
            'description' => "Heureux détenteur d'une nouvelle GTX 1080, je peux me débarasser ce celle-ci. Elle fonctionne correctement.",
            'quantity' => '1',
        ]);
        $this->addArticle($article,$category, $user);

        $category = Category::where("title", "Bijoux")->first();
        $article = new Article([
            'title' => 'Bijoux homemade',
            'price' => 20.0,
            'description' => "Envie d'impressioner votre copine/maman? Offrez lui ce magnifique bijou !",
            'quantity' => '10',
        ]);
        $this->addArticle($article,$category, $user);

        //***********************//
        //  Articles from user 2 //
        //***********************//
        $user = User::find(2);
        $category = Category::where("title", "Automobiles")->first();
        $article = new Article([
            'title' => 'Nissan gtr',
            'price' => 15200.0,
            'description' => "Je vend mon petit bébé car ma femme va avoir un bébé... je devais choisir entre ces deux bébés... j'éspère ne pas avoir fais le mauvais choix...",
            'quantity' => '1',
        ]);
        $this->addArticle($article,$category, $user);


        $article = new Article([
            'title' => 'Ferrari rouge',
            'price' => 100000.0,
            'description' => "Voiture très puissante et très séductrice. Elle m'as permis de trouver ma femme actuelle (présente sur la photo). Cependant, seule la voiture est à vendre.",
            'quantity' => '1',
        ]);
        $this->addArticle($article,$category, $user);


        $category = Category::where("title", "Animaux")->first();
        $article = new Article([
            'title' => 'Hamster',
            'price' => 0.50,
            'description' => "Acheté pour faire plaisir à ma fille, mais elle ne l'aime plus... Même mon cobra n'a pas voulu le manger.",
            'quantity' => '1',
        ]);
        $this->addArticle($article,$category, $user);

        $article = new Article([
            'title' => 'Bulldog',
            'price' => 150.0,
            'description' => "Protège très bien la maison! Il a 2ans, malheureusement je déménage dans un appart qui n'autorise pas les animaux...",
            'quantity' => '1',
        ]);
        $this->addArticle($article,$category, $user);

        $category = Category::where("title", "Informatique")->first();
        $article = new Article([
            'title' => 'Asus phone',
            'price' => 250.0,
            'description' => "Fonctionne très bien!",
            'quantity' => '1',
        ]);
        $this->addArticle($article,$category, $user);
    }

    public function addArticle($article, $category, $user){
        $article->category()->associate($category);
        $article->user()->associate($user);
        $article->save();
    }
}
