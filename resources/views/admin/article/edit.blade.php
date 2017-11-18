@extends('user.home')

@section('specific_content')
    <section class="col">
        <div class="row">
            <div class="col-sm-12">
                <h2>Édition de l'article</h2>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <form>
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" id="tilte" value="{{$article->title}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description">{{$article->description}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input class="form-control" id="price" type="number" step="0.05" value="{{$article->price}}">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantité</label>
                        <input class="form-control" id="quantity" type="number" step="1" value="{{$article->quantity}}">
                    </div>

                    <div class="form-group">
                        <label for="category">Categorie</label>

                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
        </div>
    </section>
@endsection