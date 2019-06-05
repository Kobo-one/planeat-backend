@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>null, 'title'=> now()->toDateString(),'rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="">Recipes</div>

@endsection
