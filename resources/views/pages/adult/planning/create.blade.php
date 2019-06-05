@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>null, 'title'=> $readableDate,'rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="section">
        <div class="masonry flex flex-column flex-wrap">

            @foreach($recipes as $recipe)
                <a href="{{route('planning_show',[$date,$recipe->id])}}">
                    <div class="panel masonry__item panel--masonry">
                        <div class="panel__image">
                            <img src="{{asset($recipe->img)}}" alt="{{$recipe->title}}">
                        </div>
                            <div class="panel__header">
                            </div>
                            <div class="panel__main">
                                <h1 class="panel__title">{{$recipe->title}}</h1>
                                <p><img src="{{asset('img/icons/clock-icon.svg')}}" alt="clock">{{($recipe->cooking_time_min? $recipe->cooking_time_min+$recipe->preparation_time.' - ' : null).($recipe->cooking_time_max+$recipe->preparation_time)}} min</p>
                            </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
@endsection
