@extends('layouts.app')

@section('include')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->

    <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
@endsection

@section('content')
    <div class="container">
        <a href="{{url()->previous()}}">Retour au résultat</a>
        <div class="row">
            <div class="col-sm-6">
                Display Images
                <div class="fotorama">
                    <img src="{{URL::asset('/images/articles/1/1_1.jpg')}}">
                    <img src="{{URL::asset('/images/articles/1/1_2.jpg')}}">
                    <img src="{{URL::asset('/images/articles/1/1_3.jpg')}}">
                </div>
            </div>
            <div class="col-sm-6">
                <p>Titre: {{$article->title}} </p>
                <p>Prix: {{$article->price}}.-</p>
                <p>Quantité disponible: {{$article->quantity}}</p>
                <a href="{{route('article.destroy',['id' => $article->id])}}">Delete Article</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1>Description</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p>{{$article->description}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1>Commentaires</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1>Contact</h1>
                <hr>
            </div>
        </div>
    </div>
@endsection