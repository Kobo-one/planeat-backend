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

@endsection
