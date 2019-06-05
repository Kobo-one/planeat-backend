@extends('layouts.app')
@section('member-layout')
    <div class="mobile">


            @include('partials.errors')
            @include('partials.success')
            <div>
                @yield('site-content')
            </div>


    </div>
@endsection
