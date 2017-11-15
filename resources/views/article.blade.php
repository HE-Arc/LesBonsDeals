@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{url()->previous()}}">Retour au résultat</a>
        <div class="row">
            <div class="col-sm-6">
                Display Images
            </div>
            <div class="col-sm-6">
                <p>Article n° {{$article->id}}</p>
                <p>Title: {{$article->title}} </p>
                <p>Description: {{$article->description}}</p>
                <p>Price: {{$article->price}}</p>
                <p>Quantity Avaiable: {{$article->quantity}}</p>
                <p>Number of view: {{$article->number_of_view}}</p>
                <a href="{{route('home')}}">Delete Article</a>
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

@endsection