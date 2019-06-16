@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('settings_index'), 'title'=> $title,'rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="section">
        Coming soon :D
    </div>
@endsection
