@extends('layouts.parent')

@section('header')
    @include('partials.adult.header',['back'=>route('adult_index'), 'title'=> 'Quests','rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="section">
        <div class="">
            <img class="image image--left" src="{{asset('img/icons/happiness-icon.png')}}" alt="happy icon"></div>
            <p class="text--message">Did your kids eat well? Did they try? Or did they eat nothing?</p>
        </div>

        <div class="questRatings">
            <div class="panel panel--shadow">
                <div class="panel__header">
                    <div>
                        <h2 class="panel__title">{{$questRecipe->recipe->title}}</h2>
                    </div>
                    <div class="panel__actions">
                    </div>
                </div>
                <div class="panel__main">

                </div>


            </div>
        </div>
    

@endsection
