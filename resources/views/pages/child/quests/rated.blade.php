@extends('layouts.child',['navigation'=>false])
@section('site-content')
    <div class="childContainer--full quest">

        @include('partials.child.header',['back'=>route('child_quests_index')])

        <div class="page__title">
            <div class="panel panel--shadow title--image">
                <img src="{{asset($memberquest->quest->ingredient->img)}}" alt="{{$memberquest->quest->ingredient->name}}">
            </div>
            <div class="title--text">
                <h1 class="text--uppercase">{{$memberquest->quest->ingredient->name}} Quest</h1>
            </div>
        </div>


        <div class="hero mt-sml">
            <p class="mb-0">The dish for this quest was:</p>
            <div class="panel panel--shadow panel--image mt-0" style="background-image: url('{{asset($recipe->img)}}')">
                <div class="panel__main">
                    <div class="panel__overlay">
                        <h1 class="mb-0">{{$recipe->title}}</h1>
                    </div>
                </div>
            </div>


            <div class="page__title mt-lrg">
                <div class="panel panel--shadow title--image p-3">
                    <img src="{{asset('img/icons/medal-icon.svg')}}" alt="goal icon">
                </div>
                <div class="title--text">
                    <h2 class="">You earned {{$memberquest->xp_gained}} EXP!</h2>
                </div>
            </div>

        </div>

    </div>

@endsection
