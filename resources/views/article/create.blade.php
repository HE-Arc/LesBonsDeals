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

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="">Titre</label>
                        <input type="text" class="form-control" name="title" id="title"
                               placeholder="Titre de votre annonce">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="category">Catégorie</label>
                                <select class="form-control" name="category" id="category">
                                    @foreach($categories as $category)
                                        <option>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="price">Prix</label>
                                <div class="input-group">
                                    <span class="input-group-addon">CHF</span>
                                    <input type="number" value="0" min="0" step="0.01" data-number-to-fixed="2"
                                           data-number-stepfactor="100" class="form-control currency" name="price"
                                           id="price"/>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="quantity">Quantité</label>
                                <div class="input-group">
                                    <input type="number" value="1" min="1" step="1" data-number-to-fixed="2"
                                           data-number-stepfactor="100" class="form-control" name="quantity"
                                           id="quantity"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5"
                                  placeholder="Decrivez votre annonce"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary" value="submit">Submit</button>

                </form>

                @include('layouts.errors')
            </div>
    </section>
@endsection