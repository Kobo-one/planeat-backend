@extends('layouts.parent')

@section('header')
    @include('partials.adult.bigheader',['title'=> 'Settings','rightUrl'=>null,'icon' =>null])
@endsection

@section('site-content')

    <div class="section no-container list settings">

            <a href="{{route('settings_notifications')}}">
                <div class="list__item">
                    <div class="list__icon text-center">
                        <img class="settings--icon"  src="{{asset('img/icons/notification-icon.svg')}}" alt="notification icon">
                    </div>
                    <div class="list__text">
                        <h3 class="mb-0">Notifications</h3>
                    </div>
                    <div class="list__next">
                        <img src="{{asset('img/icons/next-icon.svg')}}" alt="next icon">
                    </div>
                </div>
            </a>

            <a href="{{route('settings_family')}}">
                <div class="list__item">
                    <div class="list__icon text-center">
                        <img class="settings--icon" src="{{asset('img/icons/family-icon.svg')}}" alt="family icon">
                    </div>
                    <div class="list__text">
                        <h3 class="mb-0">Manage family</h3>
                    </div>
                    <div class="list__next">
                        <img src="{{asset('img/icons/next-icon.svg')}}" alt="next icon">
                    </div>
                </div>
            </a>

            <a href="{{route('settings_profile')}}">
                <div class="list__item">
                    <div class="list__icon text-center">
                        <img class="settings--icon" src="{{asset('img/icon-logo.svg')}}" alt="profile icon">
                    </div>
                    <div class="list__text">
                        <h3 class="mb-0">Profile</h3>
                    </div>
                    <div class="list__next">
                        <img src="{{asset('img/icons/next-icon.svg')}}" alt="next icon">
                    </div>
                </div>
            </a>

    </div>

    <div class="section no-container list settings">

        <a href="{{route('tutorial_index',1)}}">
            <div class="list__item">
                <div class="list__icon text-center">
                </div>
                <div class="list__text">
                    <h3 class="mb-0">Tutorial</h3>
                </div>
                <div class="list__next">
                    <img src="{{asset('img/icons/next-icon.svg')}}" alt="next icon">
                </div>
            </div>
        </a>

        <a href="https://info.planeat.app/cookiepolicy/">
            <div class="list__item">
                <div class="list__icon text-center">
                </div>
                <div class="list__text">
                    <h3 class="mb-0">Terms of use</h3>
                </div>
                <div class="list__next">
                    <img src="{{asset('img/icons/next-icon.svg')}}" alt="next icon">
                </div>
            </div>
        </a>

        <a href="https://info.planeat.app/cookiepolicy/">
            <div class="list__item">
                <div class="list__icon text-center">
                </div>
                <div class="list__text">
                    <h3 class="mb-0">Privacy policy</h3>
                </div>
                <div class="list__next">
                    <img src="{{asset('img/icons/next-icon.svg')}}" alt="next icon">
                </div>
            </div>
        </a>

    </div>

    <div class="logout mb-xsm">
        <a href="{{route('member_logout')}}" class="btn text--danger flex flex-align-items-center justify-content-center"><img class="mr-xsm" src="{{asset('img/icons/logout-icon.svg')}}" alt="logout"><span>Change profile</span></a>
    </div>


@endsection
