@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('family_detail',$child), 'title'=> 'Quest progress','rightUrl'=>'','icon' => '','search'=>false])
@endsection

@section('site-content')

    <div class="section">
       @foreach($difficultIngredients as $difficultIngredient)
           <div class="panel panel--shadow spacer spacer--sml">
               <div class="panel__header">
                   <div>
                       <div class="flex flex-align-items-center mb-2">
                           <img class="settings--icon" src="{{asset($difficultIngredient->ingredient->icon)}}" alt="{{$difficultIngredient->ingredient->name}}'s icon">
                           <h3 class="mt-0 ml-xsm">{{ucfirst($difficultIngredient->ingredient->name)}} quest</h3>
                       </div>

                       <p class="text--message">{{$difficultIngredient->times_tried}}/{{pow (3,$difficultIngredient->level)}} Times tried </p>
                   </div>
                   <div class="panel__actions">
                       <span class="text--secondary">level {{$difficultIngredient->level}}</span>
                   </div>
               </div>
               <div class="panel__main mb-xsm">
                   <div class="container">
                       <div class="progressBar bar--thick">
                           <div class="progressBar__progress" style="width: {{$difficultIngredient->progress()}}%"></div>
                       </div>
                   </div>

               </div>
           </div>
       @endforeach
    </div>
@endsection
