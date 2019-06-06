@extends('layouts.parent')

@section('site-content')

    <div class="recipe no-container">
        <div class="recipe__header">
            <div class="recipe__image" style="background-image: url('{{asset($recipe->img)}}')">
                <div class="header__action"><a class="recipe__back" href="{{route('recipes_index')}}">< Back</a></div>
            </div>
            <div class="recipe__title">
                <h1 class="mb-0">{{$recipe->title}}</h1>
                <p><span class="icon icon--time--green">{{($recipe->cooking_time_min? $recipe->cooking_time_min+$recipe->preparation_time.'-' : null).($recipe->cooking_time_max+$recipe->preparation_time)}} min</span></p>
            </div>
        </div>

        <div class="recipe__tile">
            <div class="tile__header">
                <h2 class="tile__header--title">Ingredients</h2>
                <ul>
                    @foreach($recipe->ingredients as $ingredient)
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
