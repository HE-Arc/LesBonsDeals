@extends('home.home')

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
                <form method="post" action="{{ route('article.update', ['id'=>$article->id]) }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" name="title" id="title"
                               placeholder="Titre" title="Titre de votre annonce" value="{{$article->title}}">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="category">Catégorie</label>
                                <select class="form-control" name="category" id="category">
                                    @foreach($categories as $category)
                                        @if($category->id == $article->category_id)
                                            <option value="{{$category->id}}" selected>{{$category->title}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="price">Prix</label>
                                <div class="input-group">
                                    <span class="input-group-addon">CHF</span>
                                    <input type="number" min="0" step="0.05" data-number-to-fixed="2"
                                           data-number-stepfactor="100" class="form-control currency" name="price"
                                           id="price" value="{{$article->price}}"/>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="quantity">Quantité</label>
                                <div class="input-group">
                                    <input type="number" min="1" step="1" data-number-to-fixed="2"
                                           data-number-stepfactor="100" class="form-control" name="quantity"
                                           id="quantity" value="{{$article->quantity}}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5"
                                  placeholder="Decrivez votre annonce">{{$article->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>

                @include('layouts.errors')
            </div>
        </div>
    </section>
@endsection