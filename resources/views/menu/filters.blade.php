<div class="col">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h2>Filtres</h2>
            <hr>
        </div>
        <div class="col-sm-12">
            <form method="GET" action="{{route(Route::current()->getName())}}">
                <input type="text" hidden value="{{$_GET['name']}}" name="name"/>
                <div class="form-group">
                    <label for="category">Catégorie</label>
                    <select class="form-control" id="category" name="category">
                        <option value="-1">Non spécifiée</option>
                        @foreach(\App\Category::all() as $cat)
                            <option value="{{$cat->id}}"
                                    @if(isset($_GET['category']) && $cat->id == $_GET['category'])
                                    selected="selected"
                                    @endif
                            >{{$cat->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="min_price">Prix minimum</label>
                    <input class="form-control" type="number" id="min_price"
                           @if(isset($_GET['min_price']))
                           value="{{$_GET['min_price']}}"
                           @endif
                           name="min_price"/>
                </div>
                <div class="form-group">
                    <label for="max_price">Prix maximum</label>
                    <input class="form-control" type="number" id="max_price"
                           @if(isset($_GET['max_price']))
                           value="{{$_GET['max_price']}}"
                           @endif
                           name="max_price"/>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input type="submit" style="text-align: center" class="btn btn-primary" value="Filtrer"/>
                </div>
            </form>
        </div>
    </div>
</div>