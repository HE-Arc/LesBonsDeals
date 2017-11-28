@extends('home.home')

@section('specific_content')
    <section class="col">
        <div class="row">
            <div class="col-sm-12">
                <h2>Mettre un article en vente</h2>
                <hr>
            </div>
        </div>

        <div class="col">
            <div class="col-sm-12">

                <form method="POST" action="{{ route('store_article') }}">

                    @include('article.form')

                </form>

                @include('layouts.errors')
            </div>
    </section>
@endsection