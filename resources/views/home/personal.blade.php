@section('include')
    <script src={{secure_asset('/js/home_script.js')}}></script>
@endsection

@extends('home.home')

@section('specific_content')
    <section class="col">
        <form method="POST" id="form" action="{{action('HomeController@updateUserInfo')}}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-12">
                    <h2>Informations personnelles
                        <button id="buttonEdit" type="button" class="btn btn-dark" onclick="edit()">Modifier</button>
                        <button id="buttonSave" type="submit" class="btn btn-success" hidden="hidden">save
                        </button>
                    </h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-auto">
                    <!-- Image from: https://pixabay.com/p-2517433/?no_redirect -->
                    <img src="{{secure_asset('/images/users/default.png')}}" height="300px">
                </div>
                <div class="col-sm-6">
                    <p>Nom d'utilisateur: {{$user->username}}</p>
                    <p>Nom: <span class="input" id="name">{{$user->name}}</span></p>
                    <p>Prénom: <span class="input" id="firstname">{{$user->firstname}}</span></p>
                    <p>Code postal: <span class="input" id="zip_code">{{$user->zip_code}}</span></p>
                    <p>Rue: <span class="input" id="street">{{$user->address}}</span></p>
                    <p>Ville: <span class="input" id="city">{{$user->city}}</span></p>
                    <p>Pays <span class="input country" id="country">{{$user->country}}</span></p>
                    <br>
                    <p> Numéro de téléphone: <span class="input" id="phone">{{$user->phone_number}}</span></p>
                    <p>Adresse e-mail: {{$user->email}}</p>
                </div>
            </div>
        </form>
    </section>
@endsection