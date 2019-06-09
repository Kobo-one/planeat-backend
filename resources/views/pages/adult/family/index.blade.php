@extends('layouts.parent')

@section('header')
    @include('partials.adult.bigheader',['title'=> 'Family','rightUrl'=>null,'icon' =>null])
@endsection

@section('site-content')

    <div class="section no-container list family">

            @foreach($members as $member)
                <a href="{{route('family_detail',$member)}}">
                    <div class="list__item">
                        <div class="list__icon">
                            <div class="panel panel--shadow user__icon">
                                <img src="{{asset($member->avatar->img)}}" alt="{{$member->name}}'s avatar">
                            </div>
                        </div>
                        <div class="list__text">
                            <h3 class="mb-0">{{$member->name}}</h3>
                            <small class="text--message">{{$member->role()}}</small>
                        </div>
                        <div class="list__next">
                            <img src="{{asset('img/icons/next-icon.svg')}}" alt="next icon">
                        </div>
                    </div>
                </a>

            @endforeach
    </div>
@endsection
