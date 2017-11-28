<!-- MENU -->
<div class="col">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h2>Catégories</h2>
            <hr>
        </div>
        <div class="col-sm-12">
            <div class="list-group" id="list-tab" role="tablist">
                @foreach(\App\Category::all() as $category)
                    <a class="list-group-item list-group-item-action
                                @if(isset($_GET['category']) and $_GET['category'] == $category->title)
                            active
@endif
                            "
                       id="list-home-list"
                       href="{{route(Route::current()->getName(), ['category' => $category->title])}}" role="tab"
                       aria-controls="home">{{$category->title}}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>