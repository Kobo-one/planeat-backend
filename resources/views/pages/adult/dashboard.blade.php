@extends('layouts.parent')

@section('header')
    @include('partials.adult.header',['back'=>false, 'title'=> '','rightUrl'=>route('member_index'),'icon' => Auth::user()->currentMember()->avatar->img])
@endsection

@section('site-content')

    <div class="section dashboard">
{{--        <div class="panel">--}}
{{--            <div class="panel__header">--}}
{{--                <div class="panel__actions">--}}
{{--                    <a href="{{route('member_index')}}"><img class="icon" src="{{asset(Auth::user()->currentMember()->avatar->img)}}"></img></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        Hi {{Auth::user()->currentMember()->name}}!
        <div class="grid grid--bp-med-2-col dashboard__items">
            <a href="{{route('recipes_index')}}" class="grid__item selection__item panel"><img src="dashboard__img" alt="Recipes icon"><h2>Recipes</h2><p>What’s on the menu today?</p></a>
            <a href="{{route('groceries_index')}}" class="grid__item selection__item panel"><img src="dashboard__img" alt="Groceries icon"><h2>Groceries</h2><p>Checkout your grocery list!</p></a>
            <a href="{{route('quest_rating')}}" class="grid__item selection__item panel"><img src="dashboard__img" alt="After dinner icon"><h2>After dinner</h2><p>Have your kids eaten well or not?</p></a>
            <a href="{{route('quests_index')}}" class="grid__item selection__item panel"><img src="dashboard__img" alt="Quests icon"><h2>Quests</h2><p>Give your kids ingredients to choose a meal from</p></a>
        </div>
    </div>

@endsection
