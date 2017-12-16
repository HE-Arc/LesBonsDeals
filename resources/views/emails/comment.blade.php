@extends('emails.notification')

@section('notification')
    <p> Un nouveau commentaire vient d'être posté par : {{$user->username}}</p>
    <h4>Commentaire:</h4>
    <p>{{$comment->comment}}</p>
@endsection