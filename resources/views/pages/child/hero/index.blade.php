@extends('layouts.child')


@section('site-content')

    <div class="home no-container">

        <div class="game__grid ml-lrg">
            @foreach($children as $child )
                <div class="character  ml-lrg">
                    <img src="{{asset($child->avatar->img)}}" alt="{{$child->name}}'s avatar">
                </div>
            @endforeach
        </div>

    </div>

@endsection

@section('subNavigation')
    <div class="nav__item {{childNav('home')}}">
        <a href="{{route('child_index')}}">
            <div class="panel panel--shadow user-switcher nav__image">
                <img src="{{asset('img/icons/map-icon.svg')}}" alt="map icon">
            </div>
            <p>Map</p>
        </a>
    </div>

    <div class="nav__item {{childNav('quests')}}">
        <a href="{{route('child_quests_index')}}">
            <div class="panel panel--shadow user-switcher nav__image">
                <img src="{{asset('img/icons/quest-icon.svg')}}" alt="quest icon">
            </div>
            <p>Quests</p>
        </a>
    </div>

    <div class="nav__item {{childNav('goals')}}">
        <a href="{{route('child_goals_index')}}">
            <div class="panel panel--shadow user-switcher nav__image">
                <img src="{{asset('img/icons/medal-icon.svg')}}" alt="goals icon">
            </div>
            <p>Goals</p>
        </a>
    </div>

@endsection
