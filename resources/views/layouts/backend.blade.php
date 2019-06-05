@extends('layouts.app')
@section('member-layout')


            @include('partials.errors')
            @include('partials.success')
            <div class="container">
                @yield('site-content')
            </div>


@endsection
