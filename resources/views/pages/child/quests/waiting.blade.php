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

        <div class="mt-sml width-100 text--center">
            <div class="loaderBox">
                <div class="loader"></div>
            </div>
            <p>Wait for the others to choose a dish. You will see the final result here!</p>
        </div>



    </div>

@endsection
