@extends('layouts.general')

@section('site-content')

    <div class="section general flex flex-column flex-align-items-center flex-justify-between">

        <div class="container user-switch">
            <h1 class="mb-med">Choose your profile</h1>

            <form action="{{route('member_login')}}" method="POST" class="users">
                {{ csrf_field() }}
                <div class="grid grid--2-col">
                    @foreach($members as $member)
                        <div class="grid__item">
                            <input type="submit" value="{{$member->id}}" name="memberId" id="member{{$member->id}}" class="hidden">
                            <label for="member{{$member->id}}">
                                <div class="panel panel--shadow user-switcher">
                                    <img src="{{asset($member->avatar->img)}}" alt="{{$member->name}}'s avatar">
                                </div>
                                <div class="mt-xsm mb-0">{{$member->name}}</div>
                                <small class="text--message">{{$member->role()}}</small>
                            </label>
                        </div>
                    @endforeach
                </div>

            </form>
        </div>

        <div class="logout">
            <a href="{{route('logout')}}" class="btn text--danger flex flex-align-items-center justify-content-center"><img class="mr-xsm" src="{{asset('img/icons/logout.svg')}}" alt="logout"><span>Logout</span></a>
        </div>

    </div>

@endsection

