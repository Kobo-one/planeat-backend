@extends('partials.adult.recipe')

@section('header__action')

    <a class="recipe__back icon--back" href="{{route('recipes_index')}}">Back</a>

@endsection

@section('header__button')

    <a href="{{route('adult_index')}}">
        <div class="btn--add" ></div>
    </a>

@endsection
