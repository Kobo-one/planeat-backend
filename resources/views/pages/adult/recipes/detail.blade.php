@extends('partials.adult.recipe')

@section('header__action')

    <a class="recipe__back icon--back" href="{{url()->previous()}}">Back</a>

@endsection

@section('header__button')

    <a class="js-toggle-popup">
        <div class="btn--add" ></div>
    </a>

@endsection


@section('recipe_footer')
    <div class="popup--date">

        <h2 class="popup__title"><label for="date">Choose a date</label></h2>
        <form action="{{route('planning_store')}}" method="post">
            @csrf
            <input type="hidden" name="recipe" value="{{$recipe->id}}">
            <input class="field field--date mb-sml" id="date" type="date" name="date" value="{{now()->toDateString()}}">

            <input class="btn btn--primary" type="submit" value="Add to planning">
        </form>


    </div>

@endsection
