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
            <div class="section">
                {{$item['day']}}
                <div class="panel panel--shadow">
                    <div class="panel__header">
                        <div>
                            <h2 class="panel__title">Ingredient</h2>
                            @if(($item['quests']))
                                <p>1 ingredient added</p>

                            @else
                                <p>No ingredient added yet</p>
                            @endif
                        </div>
                        <div class="panel__actions">
                            @if(($item['quests']))
                                <a href="{{route('quest_delete',$item['quests']->id)}}"><img
                                        src="{{asset('img/icons/cross-icon.png')}}" alt="add quest"></a>
                            @else
                                <a href="{{route('quest_create',$item['date'])}}"><img
                                        src="{{asset('img/icons/plus-icon.png')}}"
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
