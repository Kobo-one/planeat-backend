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


            @if($plannings || $quests)
                @foreach($plannings as $planning)

                <div class="spacer spacer--sml">
                    <a href="{{route('recipes_show',$planning->recipe)}}">
                        <div class="panel panel--shadow">

                            <div class="panel__header mb-0">


                                    <div class="rounded--img" style="background-image: url('{{asset($planning->recipe->img)}}')"></div>
                                <div class="ml-xsm">
                                    <h3 class="panel__title">{{$planning->recipe->title}}</h3>
                                    <small class="text--message">{{$planning->family_quest_id ? 'Quest' : $planning->recipe->recipeCategory ? $planning->recipe->recipeCategory->name : null}}</small>
                                </div>

                                <div class="panel__actions">
                                    @if($planning->shopping_added)
                                        <div class=""><img src="{{asset('img/icons/shopping-grey-icon.svg')}}" alt="already added to shopping list"></div>
                                    @else
                                        <div class="js-toggle-planning-list" data-planning="{{$planning->id}}"><img src="{{asset('img/icons/shopping-icon.svg')}}" alt="add to shopping list"></div>
                                    @endif

                                </div>
                            </div>

                            <div class="panel__main">

                            </div>
                        </div>
                    </a>
                </div>

                @endforeach

                    @foreach($quests as $quest)

                        <div class="spacer spacer--sml">
                            <div class="panel panel--shadow">

                                <div class="panel__header mb-0">
                                    <div>
                                        <h3 class="panel__title text--capitalize">{{$quest->ingredient->name}} quest</h3>
                                        <small class="text--message">Your kids are choosing a recipe for this quest.</small>
                                    </div>
                                </div>

                                <div class="panel__main">

                                </div>
                            </div>
                        </div>

                    @endforeach
            @endif

                <div class="spacer spacer--sml panel panel--shadow">
                    <div class="panel__header mb-0">
                        <div>
                            <h3 class="panel__title text--message">Add something to your planning</h3>
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


@section('popup')
    <div class="panel--shopping grocery container">
        <h2 class="popup__title">Choose a shoppinglist</h2>
        @if($lists->count()>=1)
        <form action="{{route('groceries_planning_store')}}" method="post">
            @csrf
            @foreach($lists as $list)
                <label for="list{{$list->id}}" class="panel panel--shadow ">
                    <input type="hidden" name="planning" value="">
                    <div class="grocery__planning mb-0">
                            <div class="grocery__icon--sml"><img src="{{asset('img/icons/grocery-icon.svg')}}" alt="grocery-icon"></div>
                            <input type="radio" class="hidden" id="list{{$list->id}}" name="list" value="{{$list->id}}" class="listRadio" required>
                            <div class=""><h2 class="text--left">{{$list->name}}</h2></div>
                            <div class="btn--radio"></div>
                    </div>
                </label>
            @endforeach
            <input class="btn btn--secondary mt-sml" type="submit" value="Add ingredients to this list">
        </form>
        @else
            <div class="container">
                <a href="{{route('groceries_index')}}" >
                    <div class="panel panel--shadow">
                        <div class="panel__header mb-0">
                            <div>
                                <p class="text--message">No lists found, add one here first</p>
                            </div>
                            <div class="panel__actions">
                                <img src="{{asset('img/icons/plus-icon.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="panel__main">

                        </div>
                    </div>
                </a>
            </div>
        @endif

    </div>
@endsection
