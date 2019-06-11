@extends('layouts.app')
@section('member-layout')

    @php($navigation = true)
    <div class="mobile">
        @yield('header')

        <div class="childPage">
            @include('partials.errors')
            @include('partials.success')
            @yield('site-content')
        </div>
        @includeWhen($navigation,'partials.child.navigation')
        <div class="popup">
            @yield('popup')
        </div>
    </div>
@endsection
