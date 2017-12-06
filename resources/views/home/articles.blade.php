@extends('home.home')

@section('specific_content')
    <section class="col">
        <div class="row">
            <div class="col-sm-12">
                <h2>Gestion des articles</h2>
                <hr>
            </div>
        </div>

        <div class="col">
            <div class="row">
                <div class="col-sm-12">
                    @include('layouts.status')
                </div>
            </div>
        </div>

        <div class="col">
            <div class="col-sm-12">
                <ul class="list-group">

                    @foreach($articles as $article)
                        <li class="list-group-item justify-content-between">
                            {{$article->title}}
                            <div class="btn-group float-right" role="group" aria-label="Third group">
                                <button type="button" class="btn btn-success"
                                        onclick="window.location.href='{{route('article.edit',['id'=>$article->id])}}'">
                                    <i class="material-icons">create</i>Edit
                                </button>

                                <form action="{{ route('article.destroy', ['id'=>$article->id]) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="material-icons">delete_forever</i>Delete
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach

                </ul>

            </div>
        </div>
    </section>
@endsection