@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('quest_create',$date), 'title'=> 'Create a quest','rightUrl'=>'','icon' => '','search'=>true])
@endsection

@section('site-content')

    <div class="quest section">
        <p class="text--message mb-xsm">Select max. 5 recipes with {{$ingredient->name}} your kids can choose from.</p>

        <form action="{{route('quest_store',[$date,$ingredient->id])}}" method="POST">

            {{ csrf_field() }}
            <div class="masonry flex flex-column flex-wrap">

                @foreach($recipes as $recipe)
                    <div class="panel masonry__item panel--masonry">
                        <label for="recipe{{$recipe->id}}">
                            <div class="panel__image">
                                <img src="{{asset($recipe->img)}}" alt="{{$recipe->name}}">
                            </div>
                            <div class="panel__header--overlay">
                                <div class="header__button">
                                    <input class="hidden" type="checkbox" id="recipe{{$recipe->id}}" name="recipes[]" class="recipesCheckbox" value="{{$recipe->id}}"></input>
                                    <div class="btn--select"></div>
                                    {{--                TODO: add warning when allergy--}}
                                </div>
                            </div>
                            <div class="panel__overlay">
                                <div class="panel__main">
                                    <p class="mb-0">{{$recipe->title}}</p>
                                    <p><span class="icon icon--time">{{($recipe->cooking_time_min? $recipe->cooking_time_min+$recipe->preparation_time.'-' : null).($recipe->cooking_time_max+$recipe->preparation_time)}} min</span></p>
                                </div>
                            </div>
                        </label>
                        </div>

                @endforeach


            </div>
            <input class="submit__bottom btn btn--primary" type="submit">

        </form>
    </div>

@endsection

@push('script')
    <script>

{{--        TODO: add max items--}}
        console.log('yey');

        var limit = 5;
        $("input[name='recipes[]']").change(function(evt) {
            console.log('yey');
            if($(this).siblings(':checked').length >= limit) {
                this.checked = false;
            }
        });

        $("input").change(function() {
            console.log('help');
            if(this.checked) {
                //Do stuff
            }
        });
    </script>
@endpush
