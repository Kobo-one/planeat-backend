@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('family_detail',$child), 'title'=> 'Rating history','rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="section">
        @foreach($memberQuests as $memberQuest )
            <div class="spacer spacer--sml">
                <h3 class="mb-xsm">{{\Carbon\Carbon::parse($memberQuest->quest->date)->format('jS F, Y')}}</h3>
                <div class="panel panel--shadow">
                    <div class="panel__header">
                        <div>
                            <h2 class="panel__title">{{$memberQuest->quest->selectedRecipe()->recipe->title}}</h2>
                        </div>
                    </div>
                    <div class="panel__main">
                        <div class="width-100 text--center mb-xsm">
                            <input class="rangeSelector" disabled type="range" min="5" max="15" value="{{$memberQuest->xp_gained}}">
                            <div class="rating-faces">
                                <img src="{{asset('img/icons/sad-icon.svg')}}" alt="sad face">
                                <img src="{{asset('img/icons/neutral-icon.svg')}}" alt="neutral face">
                                <img src="{{asset('img/icons/happy-icon.svg')}}" alt="happy face">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
