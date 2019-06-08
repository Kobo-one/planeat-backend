@extends('layouts.parent')

@section('site-content')

    <div class="recipe no-container">
        <div class="recipe__header">
            <div class="recipe__image" style="background-image: url('{{asset($recipe->img)}}')">
                <div class="header__action">
                    @yield('header__action')
                </div>
                <div class="header__button">
                    @yield('header__button')
                </div>
            </div>
            <div class="recipe__title">
                <h1 class="mb-0">{{$recipe->title}}</h1>
                <p><span class="icon icon--time--green">{{$recipe->preparation_time? $recipe->preparation_time.' min + ': ''}}{{($recipe->cooking_time_min? $recipe->cooking_time_min.'-' : null).($recipe->cooking_time_max)}} min</span></p>
            </div>
        </div>

        <div class="recipe__tile">
            <div class="tile__header">
                <h2 class="tile__header--title">Ingredients</h2>
                <ul>
                    @foreach($recipe->recipeIngredients as $ingredient)
                            <li><span>{{$ingredient->size}}{{$ingredient->serving_size? (' '.($ingredient->size > 1 ? str_plural($ingredient->serving_size): $ingredient->serving_size)) : null}} {{!$ingredient->serving_size && $ingredient->size > 1 ? str_plural($ingredient->ingredient->name) : $ingredient->ingredient->name}}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="recipe__tile">
            <div class="tile__header">
                <h2 class="tile__header--title">Preparation</h2>
                <ol>
                    @foreach($recipe->steps->sortBy('order') as $step)
                        <li><span>{{$step->title}}</span></li>
                    @endforeach
                </ol>
            </div>
        </div>


    </div>
@endsection

@section('popup')
    @yield('recipe_footer')
@endsection
