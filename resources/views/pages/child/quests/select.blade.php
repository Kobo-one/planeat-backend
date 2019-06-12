@extends('layouts.child',['navigation'=>false])
@section('site-content')
    <div class="childContainer--full quest">

        @include('partials.child.header')

        <div class="page__title">
            <div class="panel panel--shadow title--image">
                <img src="{{asset($memberquest->quest->ingredient->img)}}" alt="{{$memberquest->quest->ingredient->name}}">
            </div>
            <div class="title--text">
                <h1 class="text--uppercase">{{$memberquest->quest->ingredient->name}} Quest</h1>
                <p>Choose a dish you would like to eat for this quest!</p>
            </div>
        </div>


        <form class="form--bottomSubmit" action="{{route('child_quests_store')}}" method="POST">
            <input type="hidden" name="memberQuest" value="{{$memberquest->id}}">
            {{ csrf_field() }}
            <div class="masonry flex flex-column flex-wrap">

                @foreach($memberquest->quest->questRecipes as $questRecipe)
                    <div class="panel masonry__item panel--masonry">
                        <label for="questRecipe{{$questRecipe->id}}">
                            <div class="panel__image">
                                <img src="{{asset($questRecipe->recipe->img)}}" alt="{{$questRecipe->recipe->name}}">
                            </div>
                            <div class="panel__header--overlay">
                                <div class="header__button">
                                    <input class="hidden" type="radio" id="questRecipe{{$questRecipe->id}}" name="recipe" value="{{$questRecipe->id}}" required>
                                    <div class="btn--select"></div>
                                    {{--                TODO: add warning when allergy--}}
                                </div>
                            </div>
                            <div class="panel__overlay">
                                <div class="panel__main">
                                    <p class="mb-0">{{$questRecipe->recipe->title}}</p>
                                </div>
                            </div>
                        </label>
                    </div>

                @endforeach


            </div>

            <input class="submit__bottom btn btn--secondary" type="submit" value="Create quest">
        </form>


    </div>

@endsection
