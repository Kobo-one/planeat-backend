@extends('layouts.child')


@section('site-content')

<div class="home no-childContainer">

    <div class="game__grid hero ml-lrg">
        @foreach($children as $child )
            <div class="hero--equipment">
                <img class="hero--avatar" src="{{asset($child->avatar->imgBig)}}" alt="Your avatar">
                @if($child->weapon)
                    <img src="{{asset($child->weapon->img)}}" alt="{{$child->weapon->name}}" class="hero--weapon">
                @endif
                @if($child->shield)
                    <img src="{{asset($child->shield->img)}}" alt="{{$child->shield->name}}" class="hero--shield">
                @endif
            </div>
        @endforeach
    </div>

    <div class="childList list--players">
        @foreach($children as $child )
            <div class="list__item panel--left">
                <div class="list__icon"><img src="{{asset($child->avatar->img)}}" alt="{{$child->name}}'s avatar"></div>
                <div class="list__text">
                    <p>{{$child->name}}</p>
                    <small class="text--message">{{$child->xp}} EXP.</small>
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

