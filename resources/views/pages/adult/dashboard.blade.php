@extends('layouts.parent')

@section('header')
    @include('partials.adult.bigheader',['title'=> 'Hi '.Auth::user()->currentMember()->name.'!','rightUrl'=>route('member_index'),'icon' => Auth::user()->currentMember()->avatar->img])
@endsection

@section('site-content')

    <div class="dashboard no-container">
        <div class="grid grid--2-col dashboard__items">
            <a href="{{route('recipes_index')}}" class="grid__item selection__item">
                <div class="panel panel--shadow">
                    <img src="{{asset('img/icons/dashboard/dinner.svg')}}" alt="Recipes icon">
                    <h2 class="mt-xsm mb-1">Recipes</h2>
                    <small class="text--message">Browse our recipes for more inspiration!</small>
                </div>
            </a>
            <a href="{{route('groceries_index')}}" class="grid__item selection__item">
                <div class="panel panel--shadow">
                    <img src="{{asset('img/icons/dashboard/groceries.svg')}}" alt="Groceries icon">
                    <h2 class="mt-xsm mb-1">Groceries</h2>
                    <small class="text--message">Checkout your grocery list!</small>
                </div>
            </a>
            <a href="{{route('quest_rating',now()->toDateString())}}" class="grid__item selection__item">
                <div class="panel panel--shadow">
                    <img src="{{asset('img/icons/dashboard/thumbs-up.svg')}}" alt="After dinner icon">
                    <h2 class="mt-xsm mb-1">After dinner</h2>
                    <small class="text--message">Rate your kids' performance</small>
                </div>
            </a>
            <a href="{{route('quests_index')}}" class="grid__item selection__item">
                <div class="panel panel--shadow">
                    <img src="{{asset('img/icons/dashboard/harvest.svg')}}" alt="Quests icon">
                    <h2 class="mt-xsm mb-1">Quests</h2>
                    <small class="text--message">Create quests for your kids</small>
                </div>
            </a>
        </div>
    </div>

    <div class="mt-sml mb-xsm">
        <h2 class="">Today's Meal{{$todaysplannings->count() > 1 ? 's' : ''}}</h2>
        @if($todaysplannings->count()>=1)
            @foreach($todaysplannings as $planning)
                <a href="{{route('recipes_view',[$planning->recipe])}}">
                    <div class="panel panel--shadow panel--image mt-xsm" style="background-image: url('{{asset($planning->recipe->img)}}')">
                        <div class="panel__main">
                            <div class="panel__overlay">
                                <h1 class="mb-0">{{$planning->recipe->title}}</h1>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="panel panel--shadow">
                <div class="panel__header mb-0">
                    <div>
                        <h3 class="panel__title text--message">Add something to your planning</h3>
                    </div>
                    <div class="panel__actions">
                        <a href="{{route('planning_create',now()->toDateString())}}"><img src="{{asset('img/icons/plus-icon.svg')}}" alt=""></a>
                    </div>
                </div>
                <div class="panel__main">

                </div>
            </div>
        @endif
    </div>

@endsection
