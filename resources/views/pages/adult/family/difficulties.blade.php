@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('family_detail',$child), 'title'=> 'To explore ingredients','rightUrl'=>'#','icon' => 'img/icons/basic-plus-icon.svg','search'=>false])
@endsection

@section('site-content')

    <div class="section">
        @foreach($difficultIngredients as $difficultIngredient)
            <div class="panel panel--shadow spacer spacer--sml">
                <div class="panel__header mb-0">
                    <div>
                        <div class="flex flex-align-items-center mb-2">
                            <img class="settings--icon" src="{{asset($difficultIngredient->ingredient->icon)}}" alt="{{$difficultIngredient->ingredient->name}}'s icon">
                            <h3 class="mt-0 ml-xsm">{{ucfirst($difficultIngredient->ingredient->name)}}</h3>
                        </div>

                        <p class="text--message">{{$difficultIngredient->times_tried}} times tried </p>
                    </div>
                    <div class="panel__actions">
                        <form action="{{ route('familyMember_difficultIngredient_remove',[$child,$difficultIngredient]) }}" method="post">
                            <label for="remove{{$difficultIngredient->id}}"><img src="{{asset('img/icons/cross-icon.svg')}}" alt="remove quest"></label>
                            <input id="remove{{$difficultIngredient->id}}" class="hidden" type="submit" value="Delete" />
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('popup')
    <div class="panel--shopping">
        <h2 class="popup__title">Add an ingredient</h2>
        <form action="{{route('groceries_list_store')}}" method="post">
            @csrf
            <label for="name">Title</label><br>
            <input id="name" class="field field--text mb-lrg" type="text" name="name" placeholder="List name" required>
            <input class="btn btn--primary mb-xsm" type="submit">

            <input class="btn btn--secondary js-toggle-popup" type="reset">
        </form>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('.header__link').addClass('js-toggle-popup');
        })
    </script>

@endpush
