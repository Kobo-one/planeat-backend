@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('adult_index'), 'title'=> 'Quests','rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="daySlider slider js-slider">

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
                    @if($quest)
                    <div class="panel__header">
                        <div>
                            @if($quest->selectedRecipe())
                                <h2 class="panel__title">{{$quest->selectedRecipe()->recipe->title}}</h2>
                            @else
                                <h2 class="panel__title">{{$quest->ingredient->name}}</h2>
                            @endif
                        </div>
                        <div class="panel__actions">
                        </div>
                    </div>
                    <div class="panel__main">
                        @if($quest->status == 'selected')
                            <form action="{{route('quest_rating_store',$date)}}" method="POST">
                                {{csrf_field()}}
                            @foreach($children as $child)
                                <p class="mb-0">{{$child->name}}</p>
                                <div class="width-100 text--center mb-xsm">
                                    <input class="rangeSelector" type="range" min="0" max="10" value="5" name="ratings[{{$child->id}}]">
                                    <div class="rating-faces">
                                        <img src="{{asset('img/icons/sad-icon.svg')}}" alt="sad face">
                                        <img src="{{asset('img/icons/neutral-icon.svg')}}" alt="neutral face">
                                        <img src="{{asset('img/icons/happy-icon.svg')}}" alt="happy face">
                                    </div>
                                </div>
                            @endforeach
                                <br>
                                <div class="width-100 text--center mb-sml">
                                    <input class="btn btn--primary" type="submit" value="Submit">
                                </div>
                            </form>
                        @elseif($quest->status == 'created')
                            <p class="text--message">The kids are still choosing a recipe.</p>
                        @elseif($quest->status == 'rated')
                            <p class="text--message">You have already rated this quest.</p>
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
