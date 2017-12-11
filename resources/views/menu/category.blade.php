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
                    <a
                            @if(isset($_GET['category']) and $_GET['category'] == $category->title)
                            class="list-group-item list-group-item-action active"
                            @else
                            class="list-group-item list-group-item-action"
                            @endif
                            id="list-home-list"
                            href="{{route(Route::current()->getName(), array_merge($_GET, ['category' => $category->title])) }}"
                            role="tab"
                            aria-controls="home">{{$category->title}}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>