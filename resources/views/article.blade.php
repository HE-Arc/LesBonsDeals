@extends('layouts.app')

@section('include')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
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
                <div class="fotorama bg-dark">
                    @foreach($article->pictures as $picture)
                        <img src="{{Storage::disk('articles')->url($picture->path)}}">
                    @endforeach
                </div>
            </div>
            <div class="col-sm-6">
                <p><b>Titre:</b> {{$article->  title}} </p>
                <p><b>Prix:</b> {{$article->price}}.-</p>
                <p><b>Quantité disponible:</b> {{$article->quantity}}</p>
                <p><b>Vendeur:</b> <a href="/user/{{$article->user_id}}">{{$article->user->username}}</a>
                </p>
                <p><b>Nombre de vues:</b> {{$article->number_of_view}}</p>
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
                <ul class="list-group">
                    @foreach($comments as $comment)
                        <li class="list-group-item">
                            <strong>{{$comment->user->name}}</strong> - le {{$comment->created_at->format('d.m.Y')}}
                            <p>{{$comment->comment}}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="/article/{{$article->id}}/comments"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-form-label" for="comment">
                            <h4>Ajouter un commentaire</h4></label>
                        <textarea class="form-control" id="comment" name="comment"
                                  @if(Auth::guest())
                                  placeholder="Vous devez vous connecter pour écrire un commentaire."
                                  disabled
                                  @else
                                  placeholder="Votre commentaire"
                                @endif
                        ></textarea>
                    </div>

                    <div class="form-group text-center">

                        <button type="submit" class="btn btn-primary" value="submit"
                                @if(Auth::guest())
                                disabled
                                @endif
                        >Commenter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @include('layouts.errors')
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mt-5">
                <h1><i class="material-icons">perm_contact_calendar</i> Contact</h1>
                <hr>
            </div>
        </div>
        <form method="POST" action="{{route('contact',$article)}}">
            <div class="row">
                <div class="col-sm-12">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-form-label" for="contact">
                            <h4>Message pour le vendeur</h4></label>
                        <textarea class="form-control" id="contact" name="contact"
                                  @if(Auth::guest())
                                  placeholder="Vous devez vous connecter pour contacter le vendeur."
                                  disabled
                                  @else
                                  placeholder="Votre message"
                                @endif
                        ></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary" value="submit"
                            @if(Auth::guest())
                            disabled
                            @endif
                    >Envoyer
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection