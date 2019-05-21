@extends('layouts.parent')

@section('header')
    @include('partials.adult.header',['back'=>route('adult_index'), 'title'=> 'Recipes','rightUrl'=>'','icon' => ''])
@endsection

@section('site-content')

    <div class="">Recipes</div>

@endsection
