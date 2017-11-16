@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-light pt-4">
        <div class="row">
            <!-- MENU -->
            <section class="col-sm-auto mr-5 ml-3">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2>Catégories</h2>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="list-group" id="list-tab" role="tablist">
                            @foreach($categories as $category)
                            <a class="list-group-item list-group-item-action" id="list-home-list"
                               data-toggle="list" href="#list-home" role="tab" aria-controls="home">{{$category->title}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- Content index-->
            <section class="col">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Les plus récents</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    @foreach($latestArticles as $article)
                        <a href="{{route('article.show',['id' => $article->id])}}">
                            <div class="card mx-2" style="width: 14rem;">
                                <img class="card-img-top img-fluid " src="{{URL::asset('/images/articles/sample.png')}}"
                                     alt="Card image cap">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$article->title}}</h5>
                                        <p class="card-text">{{$article->price}}.-</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="row mt-5 mb-2">
                    <div class="col-sm-12">
                        <h2>Les plus populaires</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    @foreach($articlesMostViewed as $article)
                        <a href="{{route('article.show',['id' => $article->id])}}">
                            <div class="card mx-2" style="width: 14rem;">
                                <img class="card-img-top img-fluid " src="{{URL::asset('/images/articles/sample.png')}}"
                                     alt="Card image cap">
                                <div class="card text-center bg-light">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$article->title}}</h5>
                                        <p class="card-text">{{$article->price}}.-</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

@endsection