@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>null, 'title'=> $readableDate,'rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="daySlider slider js-slider">

        {{--        TODO: add js to start slider on selected class--}}
        @for($i = 14; $i >= -14; $i--)
            <div class="slide__item">
                <a href="{{route('planning_index_date',\Carbon\Carbon::now()->addDays($i)->toDateString())}}">
                    <div class="dayName">
                        {{\Carbon\Carbon::now()->addDays($i)->getTranslatedMinDayName()}}
                    </div>
                    <div class="day {{\Carbon\Carbon::now()->addDays($i)->toDateString() == $date ? 'selected': ''}}">
                        {{\Carbon\Carbon::now()->addDays($i)->day}}
                    </div>
                </a>

            </div>
        @endfor

    </div>


    <div class="section">


            @if($plannings)
                @foreach($plannings as $planning)
                <div class="panel panel--shadow">
                    <div class="panel__header">
                        <div>
                            <h2 class="panel__title">{{$planning->recipe->title}}</h2>
                        </div>
                        <div class="panel__actions">
                        </div>
                    </div>
                    <div class="panel__main">

                    </div>
                </div>
                @endforeach
            @endif

                <div class="panel panel--shadow">
                    <div class="panel__header mb-0">
                        <div>
                            <h2 class="panel__title">Add something to your planning</h2>
                        </div>
                        <div class="panel__actions">
                            <a href="{{route('planning_create',$date)}}"><img src="{{asset('img/icons/plus-icon.svg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="panel__main">

                    </div>
                </div>
        <div class="section">

        </div>
    </div>

@endsection