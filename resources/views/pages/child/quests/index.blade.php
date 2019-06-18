@extends('layouts.child')


@section('site-content')
    <div class="">
        <h1 class="text--uppercase">Quests</h1>
        <p>Your quests for this week</p>

        <div class="childList">

            <h2>New</h2>
            @if($newQuests->count())
                @foreach($newQuests as $newQuest)
                    <a href="{{route('child_quests_show',$newQuest)}}">
                        <div class="list__item panel panel--shadow panel--left">
                            <div class="list__icon"><img src="{{asset($newQuest->quest->ingredient->icon)}}" alt="{{$newQuest->quest->ingredient->name}}"></div>
                            <div class="list__text">
                                <p>{{$newQuest->quest->ingredient->name}}</p>
                                    @if($newQuest->quest_recipe_id)
                                        <small class="text--message">Wait for your siblings to make a choice!</small>
                                    @else
                                        <small class="text--message">Choose a dish with {{$newQuest->quest->ingredient->name}}!</small>
                                    @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="container">
                    <small >No new quests yet, come back later!</small>
                </div>
            @endif

            <h2>Selected</h2>
            @if($acceptedQuests->count())
                @foreach($acceptedQuests as $acceptedQuest)
                    <a href="{{route('child_quests_show',$acceptedQuest)}}">
                        <div class="list__item panel panel--shadow panel--left">
                            <div class="list__icon"><img src="{{asset($acceptedQuest->quest->ingredient->icon)}}" alt="{{$acceptedQuest->quest->ingredient->name}}"></div>
                            <div class="list__text">
                                <p>{{$acceptedQuest->quest->ingredient->name}}</p>
                                <small class="text--message">Take a look at this quest!</small>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="container">
                    <small>No selected quests yet! Start selecting quests for them to appear here!</small>
                </div>
            @endif

            <h2>Finished</h2>
            @if($completedQuests->count())

                @foreach($completedQuests as $completedQuest)
                    <a href="{{route('child_quests_show',$completedQuest)}}">
                        <div class="list__item panel panel--shadow panel--left">
                            <div class="list__icon"><img src="{{asset($completedQuest->quest->ingredient->icon)}}" alt="{{$completedQuest->quest->ingredient->name}}"></div>
                            <div class="list__text">
                                <p>{{$completedQuest->quest->ingredient->name}}</p>
                                <small class="text--message">Take a look at the EXP you gained!</small>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="container">
                    <small>No finished quests yet! This will get filled in no time, good luck!</small>
                </div>
            @endif
        </div>

    </div>

@endsection
