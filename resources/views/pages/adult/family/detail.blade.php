@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('family_index'), 'title'=> $child->name,'rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="section">
        <div class="hero">
            <div class="hero--equipment">
                <img class="hero--avatar" src="{{asset($child->avatar->imgBig)}}" alt="Your avatar">
                @if($child->weapon)
                    <img src="{{asset($child->weapon->img)}}" alt="{{$child->weapon->name}}" class="hero--weapon">
                @endif
                @if($child->shield)
                    <img src="{{asset($child->shield->img)}}" alt="{{$child->shield->name}}" class="hero--shield">
                @endif
            </div>

            <div class="width-100 text--center mt-xsm">
                <h3 class="text--secondary">Level {{$child->level}}</h3>
            </div>
        </div>

        <div class="section no-container list settings mt-lrg">

            <a href="{{route('familyMember_quest',$child)}}">
                <div class="list__item">
                    <div class="list__icon text-center">
                        <img class="settings--icon" src="{{asset('img/icons/dashboard/dinner.svg')}}" alt="dinner icon">
                    </div>
                    <div class="list__text">
                        <h3 class="mb-0">Quest progress</h3>
                    </div>
                    <div class="list__next">
                        <img src="{{asset('img/icons/next-icon.svg')}}" alt="next icon">
                    </div>
                </div>
            </a>

            <a href="{{route('familyMember_rating',$child)}}">
                <div class="list__item">
                    <div class="list__icon text-center">
                        <img class="settings--icon"  src="{{asset('img/icons/dashboard/thumbs-up.svg')}}" alt="family icon">
                    </div>
                    <div class="list__text">
                        <h3 class="mb-0">Rating history</h3>
                    </div>
                    <div class="list__next">
                        <img src="{{asset('img/icons/next-icon.svg')}}" alt="next icon">
                    </div>
                </div>
            </a>

            <a href="{{route('familyMember_difficultIngredients',$child)}}">
                <div class="list__item">
                    <div class="list__icon text-center">
                        <img class="settings--icon" src="{{asset('img/icons/foods-icon.svg')}}" alt="profile icon">
                    </div>
                    <div class="list__text">
                        <h3 class="mb-0">{{$child->name}}’s to explore ingredients</h3>
                    </div>
                    <div class="list__next">
                        <img src="{{asset('img/icons/next-icon.svg')}}" alt="next icon">
                    </div>
                </div>
            </a>

        </div>

    </div>
@endsection
