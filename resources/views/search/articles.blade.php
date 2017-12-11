@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-light pt-4">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                @include('menu.filters')
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Résultats de la recherche</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    @if(count($articles) < 1)
                        <p><i>Aucun résultats</i></p>
                    @endif
                    @foreach($articles as $article)
                        <a href="{{route('article.show',['id' => $article->id])}}">
                            <div class="card mx-2" style="width: 14rem;">
                                <img class="card-img-top img-fluid "
                                     src="{{URL::asset('/images/articles/sample.png')}}"
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
            </div>
        </div>
    </div>
@endsection