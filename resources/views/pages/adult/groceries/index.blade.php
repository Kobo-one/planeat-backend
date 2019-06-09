@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('adult_index'), 'title'=> 'Groceries','rightUrl'=>'#','icon' => 'img/icons/basic-plus-icon.svg','search'=>false])
@endsection

@section('site-content')


    <div class="section no-container grocery list">
        @if($groceryLists->count() > 0)
            @foreach($groceryLists as $groceryList)
                <a href="{{route('groceries_detail',$groceryList)}}">
                    <div class="list__item">
                        <div class="list__icon">
                            <img src="{{asset('img/icons/grocery-icon.svg')}}" alt="grocery icon">
                        </div>
                        <div class="list__text">
                            <h2 class="mb-0">{{$groceryList->name}}</h2>
                            <p class="text--message">{{$groceryList->items->count()}} item{{$groceryList->items->count() ==1? '':'s'}}</p>
                        </div>
                        <div class="list__next">
                            <img src="{{asset('img/icons/next-icon.svg')}}" alt="next icon">
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="container">
                <a href="#" class="js-toggle-popup">
                    <div class="panel panel--shadow">
                        <div class="panel__header mb-0">
                            <div>
                                <p class="text--message">No lists found, add a new one here</p>
                            </div>
                            <div class="panel__actions">
                                <img src="{{asset('img/icons/plus-icon.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="panel__main">

                        </div>
                    </div>
                </a>
            </div>

        @endif
    </div>

@endsection


@section('popup')
    <div class="panel--shopping">
        <h2 class="popup__title">Create a shoppinglist</h2>
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
