<div class="grid grid--2-col section spacer--xxs">
    {{csrf_field()}}
    <br>
    <h3>Details</h3>
    <div class="grid__item">
        <div class="form-group ">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter a name" value="{{ (old('name') !== null ? old('name') : ($ingredient ? $ingredient->name : null)) }}" required>
        </div>

        <div class="form-group ">
            <label for="image">Image</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" value="{{ (old('image') !== null ? old('image') : ($ingredient ? $ingredient->img : null)) }}">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group ">
        <label for="ingredientType">Ingredient Type</label>
        <select class="form-control" id="ingredientType" name="ingredientType" required>
            <option disabled selected hidden value="">Select an ingredient type</option>
            @foreach($ingredientTypes as $ingredientType)
                <option value="{{$ingredientType->id}}" @if(old('ingredientType') == $ingredientType->id || ($ingredient ? $ingredient->IngredientType->id : null) == $ingredientType->id) selected @endif>{{$ingredientType->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<button type="submit" class="btn btn-success">Save</button>

