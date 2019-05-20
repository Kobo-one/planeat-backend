@extends('layouts.parent')


@section('site-content')

    <div class="section dashboard">
        <div class="panel">
            <div class="panel__header">
                <div class="panel__actions">
                    <a href="{{route('member_index')}}"><img class="icon" src="{{asset(Auth::user()->currentMember()->avatar->img)}}"></img></a>
                </div>
            </div>
        </div>
        Hi {{Auth::user()->currentMember()->name}}!
        <div class="dashboard__items">
            <div class="selection__item panel"><img src="dashboard__img" alt="Recipes icon"><h2>Recipes</h2><p>What’s on the menu today?</p></div>
            <div class="selection__item panel"><img src="dashboard__img" alt="Groceries icon"><h2>Groceries</h2><p>Checkout your grocery list!</p></div>
            <div class="selection__item panel"><img src="dashboard__img" alt="After dinner icon"><h2>After dinner</h2><p>Have your kids eaten well or not?</p></div>
            <div class="selection__item panel"><img src="dashboard__img" alt="Quests icon"><h2>Quests</h2><p>Give your kids ingredients to choose a meal from</p></div>
        </div>
    </div>

@endsection
