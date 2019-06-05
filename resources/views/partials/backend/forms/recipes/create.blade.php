<div class="grid grid--2-col section spacer--xxs">
    {{csrf_field()}}
    <br>
    <h3>Details</h3>
    <div class="grid__item">
        <div class="form-group ">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ (old('title') !== null ? old('title') : ($recipe ? $recipe->title : null)) }}" required>
        </div>

        <div class="form-group ">
            <label for="image">Image</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" value="{{ (old('image') !== null ? old('image') : ($recipe ? $recipe->img : null)) }}" required>
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group grid__item">
        <label for="description">Description</label>
        <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter description" cols="30" rows="5" required>{{ (old('description') !== null ? old('description') : ($recipe ? $recipe->description : null)) }}</textarea>
    </div>
    <div class="form-group ">
        <label for="recipeType">Recipe category</label>
        <select class="form-control" id="recipeType" name="recipeType" required>
            <option disabled selected hidden value="">Select a recipe category</option>
            @foreach($recipeCategories as $recipeCategory)
                <option value="{{$recipeCategory->id}}" @if(old('recipeType') == $recipeCategory->id || ($recipe ? $recipe->recipeCategory->id : null) == $recipeCategory->id) selected @endif>{{$recipeCategory->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="grid grid--2-col section spacer--xxs">
    <h3>Time</h3>
    <div class="form-group grid__item">
        <label for="prepTime">Preparation Time <small>(optional)</small></label>
        <input type="number" class="form-control" id="prepTime" name="prepTime" placeholder="Enter preparation time" value="{{ (old('prepTime') !== null ? old('prepTime') : ($recipe ? $recipe->preparation_time : null)) }}">
        <small>In minutes</small>
        <div class="section"></div>
        <div class="section"></div>
    </div>


    <div class="grid__item">
        <div class="form-group">
            <label for="cookTimeMin">Min. Cooking Time <small>(optional)</small></label>
            <input type="number" class="form-control" id="cookTimeMin" name="cookTimeMin" placeholder="Enter minimum cooking time" value="{{ (old('cookTimeMin') !== null ? old('cookTimeMin') : ($recipe ? $recipe->cooking_time_min : null)) }}">
            <small>In minutes</small>
        </div>

        <div class="form-group">
            <label for="cookTimeMax">Max. Cooking Time</label>
            <input type="number" class="form-control" id="cookTimeMax" name="cookTimeMax" placeholder="Enter maximum cooking time" required value="{{ (old('cookTimeMax') !== null ? old('cookTimeMax') : ($recipe ? $recipe->cooking_time_max : null)) }}">
            <small>In minutes</small>
        </div>
    </div>
</div>
<div class="grid grid--2-col section spacer--xxs">
    <h3>Servings</h3>
    <div class="form-group grid__item">
        <label for="servings">Serving amount</label>
        <input type="number" class="form-control" id="servings" name="servings" placeholder="Enter servings amount" min="0" step="1" required value="{{ (old('servings') !== null ? old('servings') : ($recipe ? $recipe->servings : null)) }}">
    </div>
    <div class="form-group grid__item">
        <label for="servingType">Serving type <small>(optional)</small></label>
        <input type="text" class="form-control" id="servingType" name="servingType" placeholder="Enter serving type" value="{{ (old('servingType') !== null ? old('servingType') : ($recipe ? $recipe->serving_size : 'servings')) }}">
        <small>Examples: serving, dish, cup, bowl </small>
    </div>
</div>

<div class="section spacer--xxs">
    <h3>Ingredients</h3>
    <div class="selected_ingredients">

    </div>
    <div class="grid grid--2-col section">
        <div class="form-group">
            <label for="ingredient">Ingredient</label>
            <select class="form-control" id="ingredient" name="ingredient">
                <option disabled selected hidden value="empty">Select an ingredient</option>
                @foreach($ingriedients as $ingredient)
                    <option value="{{$ingredient->id}}" @if(old('ingredient')==$ingredient->id) selected @endif>{{$ingredient->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group grid__item">
            <label for="ingredientSize">Ingredient amount</label>
            <input type="number" class="form-control" id="ingredientSize" name="ingredientSize" placeholder="Enter ingredient size" min="0" step="1"  value="{{ old('ingredientSize')}}">
        </div>

        <div class="form-group grid__item">
            <label for="ingredientServingType">Serving type <small>(optional)</small></label>
            <input type="text" class="form-control" id="ingredientServingType" name="ingredientServingType" placeholder="Enter ingredient serving type" value="{{ old('ingredientServingType')}}">
            <small>Examples: tablespoon, teaspoon, cup </small>
        </div>
        <div class="grid__item">
            <div class="alert alert-danger collapse ingredient-alert" role="alert">
                There might be some fields not filled in!
            </div>
        </div>
        <div class="grid__item">
            <button class="btn btn-success add_ingredient_button">Add this ingredient</button>
        </div>
    </div>


</div>


<button type="submit" class="btn btn-success">Save</button>

@push('script')
    <script>
        $(document).ready(function(){
            var addButton = $('.add_ingredient_button'); //Add button selector
            var wrapper = $('.selected_ingredients'); //Input field wrapper
            var ingredients = 1;
            $('.ingredient-alert').hide();
            var $ingredient = $('select[name=ingredient]');
            var $ingredientSize = $('input[name=ingredientSize]');
            var $ingredientServingType = $('input[name=ingredientServingType]');

            $(addButton).click(function(e){
                e.preventDefault();


                var data = [];
                data['ingredient']= [$ingredient.val(),$ingredient.find('option:selected').text()];
                data['ingredientSize']= $ingredientSize.val();
                data['ingredientServingType']= $ingredientServingType.val();
                console.log(data);
                if(validate(data)){
                    $(wrapper).append(ingredient(data)); //Add field html
                    empty();
                    ingredients++;
                    $('.ingredient-alert').hide();
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_ingredient_button', function(e){
                e.preventDefault();
                $(this).parentsUntil('.selected_ingredients').remove();
            });

            function validate(data){
                if(data['ingredient'][0] && data['ingredientSize']){
                    return true;
                }else{
                    errorIngredient();
                    return false;
                }
            }

            function empty(){
                $ingredient.val('empty');
                $ingredientSize.val('');
                $ingredientServingType.val('');
            }

            function errorIngredient(){
                $('.ingredient-alert').show();
            }
            function ingredient(data) {
                return '<div class="card">'+
                    '<div class="card-body row">\n' +
                    '<p class="card-title col-sm mb-0">'+data['ingredient'][1]+'</p>'+
                    '<p class="card-text col-sm  mb-0">Size: '+data['ingredientSize']+' '+data['ingredientServingType']+'</p>'+
                    '<a href="#" class="col-sm remove_ingredient_button text--right  mb-0">Remove</a>'+
                    ' </div>'+
                    '<input type = "hidden" name="ingredients['+ingredients+']" value = "'+data['ingredient'][0]+'" />\n'+
                    '<input type = "hidden" name="ingredientSizes['+ingredients+']" value = "'+data['ingredientSize']+'" />\n' +
                    '<input type = "hidden" name="ingredientServingTypes['+ingredients+']" value = "'+data['ingredientServingType']+'" />\n'+
                    '</div>'; //New input field html

            }
        });
    </script>
@endpush
