@extends('layouts.app')
@section('member-layout')
    <div class="mobile">
        @yield('header')

        <div class="container adultPage">
            @include('partials.errors')
            @include('partials.success')
            @yield('site-content')
        </div>
        @include('partials.adult.navigation')
    </div>
@endsection
