@extends('partials.adult.recipe')

@section('header__action')

    <a class="recipe__back icon--back" href="{{url()->previous()}}">Back</a>

@endsection

@section('header__button')

    <label class="btn--add" for="add-submit">
        <form action="{{route('planning_store')}}" method="post">
            @csrf
            <input type="hidden" name="date" value="{{$date}}">
            <input type="hidden" name="recipe" value="{{$recipe->id}}">
            <input class="hidden" id='add-submit' type="submit">
        </form>
    </label>
{{--    <a href="{{route('adult_index')}}">--}}
{{--        <div class="btn--add" >--}}
{{--            <form action=""></form>--}}
{{--        </div>--}}
{{--    </a>--}}

@endsection
