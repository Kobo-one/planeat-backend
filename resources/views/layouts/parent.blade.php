@extends('layouts.app')
@section('member-layout')

            @yield('header')

            <div class="container">
    <main class="py-4">
        @yield('site-content')
    </main>
        </div>
@endsection
