@extends('layouts.app')

@section('content')

    <div id="show-list">
        <div class="container-fluid bg-light pt-4">
            <div class="row ml-2">
                <div class="col-sm-12">

                    <h1>{{$username}}</h1>
                    <h2>Infos</h2>
                    <hr>
                    <table class="table table-responsive table-bordered">

                        @if((isset($city) or isset($zip_code)) and ($city != "" or $zip_code != ""))
                            <tr>
                                <th>Ville</th>
                                @if(isset($zip_code) and $zip_code != "")
                                    <td>{{$zip_code}}</td>
                                @endif
                                @if(isset($city) and $city != "")
                                    <td>{{$city}}</td>
                                @endif

                            </tr>
                        @endif
                        <tr>
                            <th>Nombre d'articles en vente</th>
                            <td>{{$articles->count()}}</td>
                        </tr>
                        <tr>
                            <th>Nombre de vues des articles</th>
                            <td>{{$num_view}}</td>
                        </tr>
                    </table>
                    <h2>Articles</h2>
                    <hr>
                    <div class="row ml-auto">
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
            </div>
        </div>
    </div>
@endsection