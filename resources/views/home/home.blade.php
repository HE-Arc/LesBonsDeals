@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-light pt-4">
        <div class="row">
            <!-- MENU -->
            <section class="col-sm-auto mr-5 ml-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="list-group" id="list-tab" role="tablist">

                            <a class="list-group-item list-group-item-action active" id="list-home-list"
                               href="{{route('home')}}" role="tab" aria-controls="home">Informations
                                personnelles</a>
                            <a class="list-group-item list-group-item-action" id="list-home-list"
                               href="{{route('manage_articles')}}" role="tab" aria-controls="home">Articles mis en
                                vente</a>
                            <a class="list-group-item list-group-item-action" id="list-home-list"
                               href="{{route('article.create')}}" role="tab" aria-controls="home">Vendre un article</a>
                            <a class="list-group-item list-group-item-action" id="list-home-list"
                               href="{{route('settings')}}" role="tab" aria-controls="home">Gestion du
                                compte</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Content index-->
            @yield('specific_content')
        </div>
    </div>

@endsection