@extends('layouts.child',['navigation'=>false])
@section('site-content')
    <div class="childContainer--full quest">

        @include('partials.child.header',['back'=>route('child_quests_index')])

        <div class="page__title">
            <div class="panel panel--shadow title--image">
                <img src="{{asset($memberquest->quest->ingredient->icon)}}" alt="{{$memberquest->quest->ingredient->name}}">
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

            <div class="hero__details text--center mt-xsm">
                <div class="hero--equipment">
                    @php($child = Auth::user()->currentMember())
                    <img class="hero--avatar" src="{{asset($child->avatar->imgBig)}}" alt="Your avatar">
                    @if($child->weapon)
                        <img src="{{asset($child->weapon->img)}}" alt="{{$child->weapon->name}}" class="hero--weapon">
                    @endif
                    @if($child->shield)
                        <img src="{{asset($child->shield->img)}}" alt="{{$child->shield->name}}" class="hero--shield">
                    @endif
                </div>
                <p>
                    What a good choice! I love this dish. </p> <p> Remember that if you eat this dish you can make me stronger and we can defeat the monster soon!
                </p>
                
            </div>

        </div>

    </div>

@endsection
