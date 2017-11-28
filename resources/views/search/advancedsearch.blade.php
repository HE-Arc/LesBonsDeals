@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-light pt-4">
        <div class="row">
            <section class="col">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Recherche avancée</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <form action="{{route('article_find')}}" method="GET">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="request" placeholder="Nom de l'article">
                            </div>
                            <select class="form-control">
                                @foreach(\App\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection