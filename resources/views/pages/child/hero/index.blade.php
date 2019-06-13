@extends('layouts.child')


@section('site-content')

    <div class="hero">

        @include('partials.child.hero')

        <div class="childList hero-items">
            @foreach($equipments as $equipment)
                <a {!! ($equipment->unlock_level <= $child->level)? 'href="'.route('child_equipment_store',$equipment).'"' : 'disabled'!!} >
                    <div class="list__item panel panel--shadow panel--left">
                        <div class="list__icon"><img src="{{asset($equipment->img)}}" alt="{{$equipment->name}}"></div>
                        <div class="list__text">
                            @if($equipment == $equipped)
                                <span class="active">Active</span>
                            @elseif($equipment->unlock_level <= $child->level)
                                <span class="unlocked">Unlocked</span>
                            @else
                                <span class="locked">Reach level {{$equipment->unlock_level}} to unlock</span>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>



    </div>

@endsection

@section('subNavigation')
    <div class="nav__item {{childNav('subhero')}}">
        <a href="{{route('child_hero_index')}}">
            <div class="panel panel--shadow user-switcher nav__image">
                <img src="{{asset('img/icons/heroes-icon.svg')}}" alt="heroes icon">
            </div>
            <p>Heroes</p>
        </a>
    </div>

    <div class="nav__item {{childNav('weapons')}}">
        <a href="{{route('child_hero_weapons')}}">
            <div class="panel panel--shadow user-switcher nav__image">
                <img src="{{asset('img/icons/sword-icon.svg')}}" alt="weapon icon">
            </div>
            <p>Weapons</p>
        </a>
    </div>

    <div class="nav__item {{childNav('shields')}}">
        <a href="{{route('child_hero_shields')}}">
            <div class="panel panel--shadow user-switcher nav__image">
                <img src="{{asset('img/icons/shield-icon.svg')}}" alt="shield icon">
            </div>
            <p>Shields</p>
        </a>
    </div>

@endsection
