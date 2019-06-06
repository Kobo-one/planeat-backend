@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('quests_index'), 'title'=> 'Create a quest','rightUrl'=>'','icon' => '','search'=>true])
@endsection

@section('site-content')

    <div class="section">
        <div class="masonry flex flex-column flex-wrap">

            @foreach($ingredients as $ingredient)
                <a href="{{route('quest_create_with_ingredient',[$date,$ingredient->id])}}" class="panel masonry__item panel--masonry">
                    <div>
                        <div class="panel__image">
                            <img src="{{asset($ingredient->img)}}" alt="{{$ingredient->name}}">
                        </div>
                        <div class="panel__overlay">
                            <div class="panel__header">
                            </div>
                            <div class="panel__main">
                                <p class=mb-0">{{$ingredient->name}}</p>
                            </div>
                        </div>
                    </div>
                </a>

            @endforeach

        </div>
    </div>

@endsection
