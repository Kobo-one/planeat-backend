@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('adult_index'), 'title'=> 'Quests','rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="section">
        <div class="">
            <img class="image image--left" src="{{asset('img/icons/question-icon.png')}}" alt="questionmark"></div>
        <p class="text--message">Choose an ingredient for your kids. They will choose a meal based on that
            ingredient</p>
    </div>

    <div class="section questList">
        @foreach($listItems as $item)
            <div class="spacer spacer--sml">
                <h3 class="font-weight-bold mb-xsm">{{$item['day']}}</h3>
                <div class="panel panel--shadow">
                    <div class="panel__header mb-0">
                        <div>
                            <h3 class="panel__title">Ingredient</h3>
                            <small class="text--message">{{$item['quests']?'1 ingredient added':'No ingredient added yet'}}</small>
                        </div>
                        <div class="panel__actions">
                            @if(($item['quests']))
                                <a href="{{route('quest_delete',$item['quests']->id)}}"><img
                                        src="{{asset('img/icons/cross-icon.svg')}}" alt="add quest"></a>
                            @else
                                <a href="{{route('quest_create',$item['date'])}}"><img
                                        src="{{asset('img/icons/plus-icon.svg')}}"
                                        alt="add quest"></a>
                            @endif
                        </div>

                    </div>
                    <div class="panel__main">
                        @if(($item['quests']))
                            <div class="grid">
                                <div class="grid__2"><img src="{{asset($item['quests']->ingredient->img)}}"
                                                          alt=""></div>
                                <div class="grid__9"><p>{{$item['quests']->ingredient->name}}</p></div>
                                <div class="grid__1"><a href="{{route('quest_detail',$item['quests']->id)}}">
                                        <div class="icon icon__right"></div>
                                    </a></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        @endforeach


    </div>

@endsection
