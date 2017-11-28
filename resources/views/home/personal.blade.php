@extends('home.home')

@section('specific_content')
    <section class="col">
        <div class="row">
            <div class="col-sm-12">
                <h2>Informations personnelles</h2>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-auto">
                <!-- Image from: https://pixabay.com/p-2517433/?no_redirect -->
                <img src="{{URL::asset('/images/users/default.png')}}" height="300px">
            </div>
            <div class="col-sm-6">
                <p>Nom: {{$user->name}}</p>
                <p>Prénom: </p>
                <p>Code postal: </p>
                <p>Rue: </p>
                <p>Ville: </p>
                <p>Pays</p>
                <br>
                <p> Numéro de téléphone: </p>
                <p>Adresse e-mail: {{$user->email}}</p>
            </div>
        </div>
    </section>
@endsection