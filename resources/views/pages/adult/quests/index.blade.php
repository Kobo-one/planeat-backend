@extends('layouts.parent')

@section('header')
    @include('partials.adult.header',['back'=>'true', 'title'=> 'Quests','rightUrl'=>'','icon' => ''])
@endsection

@section('site-content')

    <div class="section">
        <div class="grid">
            <div class="grid__item"><img src="{{asset('img/icons/question-icon.png')}}" alt="questionmark"></div>
            <div class="grid__item"><p>Choose an ingrediënt for your kids. They will choose a meal based on that ingrediënt</p></div>
        </div>

        <div class="section questList">
            @foreach($listItems as $item)
                <div class="section">
                    {{$item['day']}}
                    <div class="questList__item">Ingredient</div>
                    @if(($item['quests']))
                        <p>1 ingredient added</p>
                        <img src="{{asset($item['quests']->ingredient->img)}}" alt="">
                        <p>{{$item['quests']->ingredient->name}}</p>
                    @else
                    <p>No ingredient added yet</p>
                    @endif
                    <div class="item__action">
                        <img src="{{asset('img/icons/plus.png')}}" alt="">
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
