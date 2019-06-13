@extends('layouts.child')


@section('site-content')

    <div class="goals">
        <div class="grid grid--2-col mr-xsm mb-sml">
            <div class="grid__item"><h1 class="text--uppercase">Goals</h1></div>
            <div class="grid__item text--right"><span class="">{{$child->xp}} EXP.</span></div>
        </div>
        <div class="childList">
            @foreach($difficultIngredients as $difficultIngredient)
                    <div class="list__item panel panel--shadow panel--left">
                        <div class="list__icon "><img src="{{asset($difficultIngredient->ingredient->img)}}" alt="{{$difficultIngredient->ingredient->name}}"></div>
                        <div class="list__text text--message ">
                            <p class="">Complete the {{ strtolower($difficultIngredient->ingredient->name)}} quest {{pow(3,$difficultIngredient->level)}} times</p>
                            <div class="progressBar mt-1">
                                <div class="progressBar__progress" style="width: {{$difficultIngredient->progress()}}%"></div>
                            </div>
                        </div>
                        @if($difficultIngredient->progress() >= 100)
                            <a href="{{route('child_goals_collect',$difficultIngredient)}}" class="list__button btn btn--secondary">Collect</a>
                        @endif
                    </div>
            @endforeach
        </div>



    </div>

@endsection
