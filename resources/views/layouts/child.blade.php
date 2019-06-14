@extends('layouts.app')
@section('member-layout')

    <div class="mobile">
        @yield('header')

        <div class="childPage">
            @include('partials.child.errors')
            @include('partials.child.success')
            @yield('site-content')
        </div>
        @includeWhen(!isset($navigation),'partials.child.navigation')
        <div class="popup">
            @yield('popup')
        </div>
    </div>
@endsection
