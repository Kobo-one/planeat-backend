@extends('layouts.app')
@section('member-layout')

    @yield('header')

    <div class="container">
        @include('partials.errors')
        @include('partials.success')
        <main class="py-4">

            @yield('site-content')
        </main>
    </div>
    @include('partials.adult.navigation')
@endsection
