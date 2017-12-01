@extends('layouts.app')

@section('include')
    <link rel="stylesheet" href={{URL::asset('/css/owl.carousel.min.css')}}>
    <link rel="stylesheet" href={{URL::asset('/css/owl.theme.default.min.css')}}>
@endsection

@section('content')
    <div class="container-fluid bg-light pt-4">
        <div class="row">
        @include('menu.category')
        <!-- Content index-->
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Les plus récents</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="owl-carousel">
                            @foreach($latestArticles as $article)
                                <a href="{{route('article.show',['id' => $article->id])}}">
                                    <div class="card mx-2" style="width: 14rem;">
                                        <img class="card-img-top img-fluid "
                                             @if(!$article->pictures->isEmpty())
                                             src="{{Storage::disk('articles')->url($article->pictures[0]->path)}}"
                                             @else
                                             src="{{URL::asset('/images/articles/sample.png')}}"
                                             @endif
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
                <div class="row mt-5 mb-2">
                    <div class="col-sm-12">
                        <h2>Les plus populaires</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="owl-carousel">
                            @foreach($articlesMostViewed as $article)
                                <a href="{{route('article.show',['id' => $article->id])}}">
                                    <div class="card mx-2 item" style="width: 14rem;">
                                        <img class="card-img-top img-fluid"
                                             @if(!$article->pictures->isEmpty())
                                             src="{{Storage::disk('articles')->url($article->pictures[0]->path)}}"
                                             @else
                                             src="{{URL::asset('/images/articles/sample.png')}}"
                                             @endif
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('include_footer')
    <script src={{URL::asset('/js/owl.carousel.min.js')}}></script>
    <script src={{URL::asset('/js/scripts.js')}}></script>
@endsection
