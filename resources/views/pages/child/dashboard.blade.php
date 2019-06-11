@extends('layouts.child')


@section('site-content')

<div class="home no-container">

    <div class="game__grid ml-lrg">
        @foreach($children as $child )
            <div class="character  ml-lrg">
                <img src="{{asset($child->avatar->img)}}" alt="{{$child->name}}'s avatar">
            </div>
        @endforeach
    </div>

</div>

@endsection

