@extends('layouts.app')
@section('member-layout')
        <div class="container">
            @yield('header')


    <main class="py-4">
        @yield('site-content')
    </main>
        </div>
@endsection
