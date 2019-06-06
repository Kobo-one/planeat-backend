@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('planning_index_date',$date), 'title'=> $readableDate,'rightUrl'=>'','icon' => '','search'=>true])
@endsection

@section('site-content')

    <div class="section">
        <div class="masonry flex flex-column flex-wrap">

            @foreach($recipes as $recipe)
                <a href="{{route('planning_show',[$date,$recipe->id])}}" class="masonry__item panel panel--masonry">
                    <div class="" >
                            <div class="panel__image">
                                <img src="{{asset($recipe->img)}}" alt="{{$recipe->title}}">
                            </div>
                            <div class="panel__overlay">
                                <div class="panel__header">
                                    {{--                TODO: add warning when allergy--}}
                                </div>
                                <div class="panel__main">
                                    <p class="mb-0">{{$recipe->title}}</p>
                                    <p><span class="icon icon--time">{{($recipe->cooking_time_min? $recipe->cooking_time_min+$recipe->preparation_time.'-' : null).($recipe->cooking_time_max+$recipe->preparation_time)}} min</span></p>
                                </div>
                            </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
@endsection
