@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('family_detail',$child), 'title'=> 'To explore ingredients','rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="section">

    </div>
@endsection
