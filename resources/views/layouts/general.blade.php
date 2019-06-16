@extends('layouts.app')
@section('member-layout')
    <div class="mobile">


        <div class="container">
            @include('partials.errors')
            @include('partials.success')
        </div>
            <div>
                @yield('site-content')
            </div>


    </div>
@endsection
