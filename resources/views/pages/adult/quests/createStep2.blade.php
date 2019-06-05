@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('quests_index'), 'title'=> 'Create a quest','rightUrl'=>'','icon' => '','search'=>true])
@endsection

@section('site-content')

    <div class="section">
        <form action="{{route('quest_store',[$date,$ingredient->id])}}" method="POST">

            {{ csrf_field() }}
            <div class="masonry flex flex-column flex-wrap">

                @foreach($recipes as $recipe)
                    <div class="panel masonry__item panel--masonry">
                    <input type="checkbox" id="recipe{{$recipe->id}}" name="recipes[]" class="recipesCheckbox" value="{{$recipe->id}}" ></input>
                        <label for="recipe{{$recipe->id}}">
                            <div class="panel__image">
                                <img src="{{asset($recipe->img)}}" alt="{{$recipe->name}}">
                            </div>
                            <div class="container">
                                <div class="panel__header">
                                    {{--                TODO: add warning when allergy--}}
                                </div>
                                <div class="panel__main">
                                    <h1 class="panel__title">{{$recipe->title}}</h1>
                                </div>
                            </div>
                        </label>
                        </div>

                @endforeach


            </div>
            <input type="submit">

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
