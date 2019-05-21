@extends('layouts.parent')

@section('header')
    @include('partials.adult.header',['back'=>'true', 'title'=> 'Quests','rightUrl'=>'','icon' => ''])
@endsection

@section('site-content')

    <div class="section">
        <div class="grid">
            <div class="grid__item"><img src="{{asset('img/icons/question-icon.png')}}" alt="questionmark"></div>
            <div class="grid__item"><p class="text text--light">Choose an ingredient for your kids. They will choose a meal based on that ingrediënt</p></div>
        </div>

        <div class="section questList">
            @foreach($listItems as $item)
                <div class="section">
                    {{$item['day']}}
                    <div class="questList__item">Ingredient</div>
                    @if(($item['quests']))
                        <p>1 ingredient added</p>
                        <div class="grid">
                            <div class="grid__item"><img src="{{asset($item['quests']->ingredient->img)}}" alt=""></div>
                            <div class="grid__item"><p>{{$item['quests']->ingredient->name}}</p></div>
                            <div class="grid__item"><a href="{{route('quest_detail',$item['quests']->id)}}"><div class="icon icon__right"></div></a></div>
                        </div>

                    @else
                    <p>No ingredient added yet</p>
                    @endif
                    <div class="item__action">
                        @if(($item['quests']))
                            <a href="{{route('quest_delete',$item['quests']->id)}}"><img src="{{asset('img/icons/cross-icon.png')}}" alt="add quest"></a>
                        @else
                            <a href="{{route('quest_create')}}"><img src="{{asset('img/icons/plus-icon.png')}}" alt="add quest"></a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
