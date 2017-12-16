@extends('layouts.app')

@section('include')
    <script src={{secure_asset('/js/preview_article.js')}}></script>
@endsection

@section('content')
    <div class="container-fluid bg-light pt-4">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                @include('menu.filters')
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="row">
                    <div class="col-sm">
                        <h2>Résultats de la recherche</h2>
                    </div>
                    <div class="col-sm1-1">

                        <h2>
                            <span style="cursor: pointer">
                                <i class="material-icons md-36" onclick="showAsCard()">grid_on</i>
                            </span>
                        </h2>

                    </div>
                    <div class="col-sm1-1">
                        <span style="cursor: pointer">
                        <h2><i class="material-icons md-36" onclick="showAsList()">list</i></h2>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                    </div>
                </div>
                <!------------------>
                <!-- Show Article -->
                <!------------------>

                <div id="show-list">
                    <div class="row">
                        @if(count($articles) < 1)
                            <p><i>Aucun résultats</i></p>
                        @endif
                        @foreach($articles as $article)
                            <div class="article">
                                <a class="article-link" href="{{route('article.show',['id' => $article->id])}}">
                                    <div class="card mx-2 item" style="width: 14rem;">
                                        <img class="card-img-top img-fluid image-article"
                                             @if(!$article->pictures->isEmpty())
                                             src="{{Storage::disk('articles')->url($article->pictures[0]->path)}}"
                                             @else
                                             src="{{secure_asset('/images/articles/sample.png')}}"
                                             @endif
                                             alt="Card image cap">
                                        <div class="card text-center bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title article-name">{{$article->title}}</h5>
                                                <h6 class="description" hidden="hidden">{{$article->description}}</h6>
                                                <p class="card-text article-price"> Prix: {{$article->price}}.-</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    {{$articles->appends(request()->except('page'))->links('pagination::bootstrap-4')}}
                </div>
                @if($_COOKIE['display_mode'] == 'list')
                    <script>
                        showAsList();
                    </script>
                @endif
            </div>
        </div>
    </div>
@endsection