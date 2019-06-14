@extends('layouts.child')


@section('site-content')

    <div class="">
        <h1 class="text--uppercase">Quests</h1>
        <p>Your quests for this week</p>

        <div class="childList">
            @foreach($memberquests as $memberquest)
                <a href="{{route('child_quests_show',$memberquest)}}">
                    <div class="list__item panel panel--shadow panel--left">
                        <div class="list__icon"><img src="{{asset($memberquest->quest->ingredient->icon)}}" alt="{{$memberquest->quest->ingredient->name}}"></div>
                        <div class="list__text">
                            <p>{{$memberquest->quest->ingredient->name}}</p>

                                @if($memberquest->quest->status == 'created')
                                    @if($memberquest->quest_recipe_id)
                                        <small class="text--message">Wait for your siblings to make a choice!</small>
                                    @else
                                        <small class="text--message">Choose a dish with {{$memberquest->quest->ingredient->name}}!</small>
                                    @endif
                                @elseif($memberquest->quest->status == 'selected')
                                    <small class="text--message">Take a look at this quest!</small>
                                @elseif($memberquest->quest->status == 'rated')
                                    <small class="text--message">Take a look at the xp you gained!</small>
                                @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>



    </div>

@endsection
