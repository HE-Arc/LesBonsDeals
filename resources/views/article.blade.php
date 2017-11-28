@extends('layouts.app')

@section('include')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->

    <link href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 my-4">
                <a href="{{url()->previous()}}">
                    <i class="material-icons">arrow_back</i>
                    Retour au résultat</a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="fotorama">
                    @foreach($article->pictures as $picture)
                    <img src="{{URL::asset($picture->path)}}">
                        @endforeach
                </div>
            </div>
            <div class="col-sm-6">
                <p><b>Titre:</b> {{$article->  title}} </p>
                <p><b>Prix:</b> {{$article->price}}.-</p>
                <p><b>Quantité disponible:</b> {{$article->quantity}}</p>
                <p><b>Vendeur:</b> {{$article->user->name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1><i class="material-icons">description</i> Description</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p>{{$article->description}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mt-4">
                <h1><i class="material-icons">comment</i> Commentaires</h1>
                <hr>
                @foreach($comments as $comment)
                    <p>{{$comment->user->name}}: {{$comment->comment}}</p>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form>
                    <div class="form-group">
                        <label class="col-form-label" for="comment"><h4>Ajouter un commentaire</h4></label>
                        <input type="text" class="form-control" id="comment" placeholder="Votre commentaire">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="#" class="btn btn-primary btn-lg " role="button">Commenter</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mt-5">
                <h1><i class="material-icons">perm_contact_calendar</i> Contact</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form>
                    <div class="form-group">
                        <label class="col-form-label" for="contact"><h4>Message pour le vendeur</h4></label>
                        <input type="text" class="form-control" id="contact" placeholder="Votre message">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="#" class="btn btn-primary btn-lg " role="button">Envoyer</a>
            </div>
        </div>
    </div>
@endsection