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
            <p class="mb-0">The chosen dish is:</p>
            <div class="panel panel--shadow panel--image mt-0" style="background-image: url('{{asset($recipe->img)}}')">
                <div class="panel__main">
                    <div class="panel__overlay">
                        <h1 class="mb-0">{{$recipe->title}}</h1>
                    </div>
                </div>
            </div>

            <div class="hero__details text--center mt-med">
                <img class="mb-xsm" src="{{asset(Auth::user()->currentMember()->avatar->img)}}" alt="Your avatar">
                <p>
                    What a good choice! I love this dish. </p> <p> Remember that if you eat this dish you can make me stronger and we can defeat the monster soon!
                </p>
                
            </div>

        </div>

    </div>

@endsection
