@extends('layouts.general')

@section('site-content')

    <div class="section general flex flex-column flex-align-items-center flex-justify-between">

           <img class="logo" src="{{asset('img/logo-named.svg')}}" alt="Planeat Logo">
           <div class="image--full-width">
               <a href="{{route('login')}}" class="btn btn--primary mb-xsm">Log in</a><br>
               <a href="{{route('register')}}" class="btn btn--secondary">Register</a>
           </div>
    </div>

@endsection
