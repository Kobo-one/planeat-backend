@extends('layouts.parent')

@section('header')
    @include('partials.adult.header',['back'=>route('adult_index'), 'title'=> 'Quests','rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="daySlider slider">

{{--        TODO: add js to start slider on selected class--}}
        @for($i = 0; $i >= -14; $i--)
            <div class="slide__item">
                <a href="{{route('quest_rating',\Carbon\Carbon::now()->addDays($i)->toDateString())}}">
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
        <div class="">
            <img class="image image--left" src="{{asset('img/icons/happiness-icon.png')}}" alt="happy icon"></div>
            <p class="text--message">Did your kids eat well? Did they try? Or did they eat nothing?</p>
        </div>

        <div class="questRatings">

                <div class="panel panel--shadow">
                    @if($questRecipe)
                    <div class="panel__header">
                        <div>
                            <h2 class="panel__title">{{$questRecipe->recipe->title}}</h2>
                        </div>
                        <div class="panel__actions">
                        </div>
                    </div>
                    <div class="panel__main">
                        @if($quest->status != 'rated')
                            <form action="{{route('quest_rating_store',$date)}}" method="POST">
                                {{csrf_field()}}
                            @foreach($children as $child)
                                <p>{{$child->name}}</p>
                                <input type="range" min="1" max="10" value="5" name="ratings[{{$child->id}}]">
                            @endforeach
                                <br>
                                <div class="section">
                                    <input type="submit">
                                </div>
                            </form>
                        @endif
                    </div>
                    @else
                        <div class="panel__main">
                            <p class="text--message">There was no quest on {{$date}}</p>
                        </div>
                    @endif
                </div>
            <div class="section"></div>
        </div>


@endsection
