@extends('layouts.child')


@section('site-content')

<div class="home no-childContainer">

    <div class="game__grid hero">
        @php($user = Auth::user()->currentMember())
        @foreach($children as $child )
            <div class="hero--equipment {{$child == $user? 'front' : ''}} grid-start--{{$child->level}}" style=" left: {{abs(array_sum([$child->progress(),((($child->level % 2) == 0 )? 0 : -100)]))}}%">
                <img class="hero--avatar" src="{{asset($child->avatar->imgBig)}}" alt="Your avatar">
                @if($child->weapon)
                    <img src="{{asset($child->weapon->img)}}" alt="{{$child->weapon->name}}" class="hero--weapon">
                @endif
                @if($child->shield)
                    <img src="{{asset($child->shield->img)}}" alt="{{$child->shield->name}}" class="hero--shield">
                @endif
                <br>
                <span class="small">{{$child->name}}</span>
            </div>
        @endforeach
    </div>

    <div class="childList list--players">

        @foreach($children as $child )
            <div class="list__item panel--left {{ $child->id == $user->id? 'selected' : ''}}">
                <div class="list__icon"><img src="{{asset($child->avatar->img)}}" alt="{{$child->name}}'s avatar"></div>
                <div class="list__text">
                    <p>{{$child->name}}</p>
                    <small class="text--message">Lvl {{$child->level}} ({{$child->xp}} EXP.)</small>
                    <div class="progressBar">
                        <div class="progressBar__progress" style="width: {{$child->progress()}}%"></div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <nav class="childNavigation childNavigation--bottom">


        <div class="nav__item">
            <a href="{{route('child_dinner_index')}}">
                <div class="panel panel--shadow user-switcher nav__image">
                    <img src="{{asset('img/icons/menu-icon.svg')}}" alt="dinner icon">
                </div>
                <p>Menu</p>
            </a>
        </div>

        <div class="nav__item">
            <a href="{{route('member_logout')}}">
                <div class="panel panel--shadow user-switcher nav__image">
                    <img src="{{asset('img/icons/logout-icon.svg')}}" alt="logout icon">
                </div>
            </a>
        </div>



    </nav>


</div>

@endsection

