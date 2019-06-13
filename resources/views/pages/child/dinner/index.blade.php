@extends('layouts.child',['navigation'=>false])
@section('site-content')
    <div class="childContainer--full quest">

        @include('partials.child.header',['back'=>route('child_quests_index')])

        <div class="page__title">
            <div class="panel panel--shadow title--image p-3">
                <img src="{{asset('img/icons/dashboard/dinner.svg')}}" alt="dinner icon">
            </div>
            <div class="title--text">
                <h1 class="">Your dinner for today!</h1>
            </div>
        </div>


        <div class="hero mt-sml">
            @if($planning)
                <div class="panel panel--shadow panel--image mt-0" style="background-image: url('{{asset($planning->recipe->img)}}')">
                    <div class="panel__main">
                        <div class="panel__overlay">
                            <h1 class="mb-0">{{$planning->recipe->title}}</h1>
                        </div>
                    </div>
                </div>

                <div class="page__title">
                    <div class="panel panel--shadow title--image p-3">
                        <img src="{{asset($planning->quest->ingredient->img)}}" alt="ingredient icon">
                    </div>
                    <div class="title--text">
                        <h2 class="">Earn up to 15xp!</h2>
                    </div>
                </div>

            @else
                <p>Seems like there is no quest for today. You could ask your parents for more information?</p>
            @endif


        </div>

    </div>

@endsection
