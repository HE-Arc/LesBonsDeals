@extends('user.home')

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
                <form method="post" action="/home">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="">Titre</label>
                        <input type="text" class="form-control" id="title" placeholder="Titre de votre annonce"
                               required>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="category">Catégorie</label>
                                <select class="form-control" id="category">
                                    <option>cat 1</option>
                                    <option>cat 2</option>
                                    <option>cat 3</option>
                                    <option>cat 4</option>
                                    <option>cat 5</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="price">Prix</label>
                                <div class="input-group">
                                    <span class="input-group-addon">CHF</span>
                                    <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2"
                                           data-number-stepfactor="100" class="form-control currency" id="price"/>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="quantity">Quantité</label>
                                <div class="input-group">
                                    <input type="number" value="1000" min="1" step="1" data-number-to-fixed="2"
                                           data-number-stepfactor="100" class="form-control" id="quantity"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="5" placeholder="Decrivez votre annonce"
                                  required></textarea>
                    </div>

                    <form>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" accept="image/*">
                        </div>
                    </form>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

                @include('layouts.errors')

            </div>
        </div>
    </section>
@endsection