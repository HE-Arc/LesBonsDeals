@extends('emails.notification')

@section('notification')
    <p> L'utilisateur {{$user->username}} souhaite vous contacter.</p>
    <h4>Contact de l'utilisateur:</h4>
    {{$user->firstname}} {{$user->name}}<br>
    {{$user->address}}<br>
    {{$user->zip_code}} {{$user->city}}<br>
    {{$user->country}} <br><br>

    Téléphone: {{$user->phone_number}}

    <h4>Message:</h4>
    <p>{{$comment}}</p>
@endsection