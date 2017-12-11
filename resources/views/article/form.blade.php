{{ csrf_field() }}

<div class="form-group">
    <label for="title">Titre</label>
    <input type="text" class="form-control" name="title" id="title"
           placeholder="Titre" title="Titre de votre annonce" value="{{ old('title') }}">
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="category">Catégorie</label>
            <select class="form-control" name="category" id="category">
                @foreach($categories as $category)
                    @if($category->title == old('category'))
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
                       id="price" value="{{ old('price') }}" />
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="quantity">Quantité</label>
            <div class="input-group">
                <input type="number" min="1" step="1" data-number-to-fixed="2"
                       data-number-stepfactor="100" class="form-control" name="quantity"
                       id="quantity" value="{{ old('quantity') }}" />
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description" rows="5"
              placeholder="Decrivez votre annonce">{{ old('description') }}</textarea>
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input class="form-control-file" type="file" data-preview="#preview" name="image[]" id="image" accept="image/*" multiple>
</div>

<button type="submit" class="btn btn-primary" value="submit">Mettre en ligne</button>