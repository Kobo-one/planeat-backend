@extends('layouts.child')


@section('site-content')

<div class="home no-childContainer">

    <div class="game__grid ml-lrg">
        @foreach($children as $child )
            <div class="character  ml-lrg">
                <img src="{{asset($child->avatar->img)}}" alt="{{$child->name}}'s avatar">
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

</div>

@endsection

