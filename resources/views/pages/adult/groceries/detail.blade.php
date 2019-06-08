@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>route('groceries_index'), 'title'=> 'Groceries','rightUrl'=>'#','icon' => 'img/icons/basic-plus-icon.svg','search'=>false])
@endsection

@section('site-content')

    <div class="section no-container grocery">

    <div class="grocery__list grocery__list--header container mb-xsm">
        <div class="grocery__icon float-left mr-med">
            <img src="{{asset('img/icons/grocery-icon.svg')}}" alt="grocery icon">
        </div>
        <div class="grocery__header">
            <h2 class="mb-0">{{$groceryList->name}}</h2>
            <p class="text--message">{{$groceryList->items->count()}} item{{$groceryList->items->count() ==1? '':'s'}}</p>
        </div>
    </div>
        @if($groceryItems->count() > 0)


            @foreach($groceryItems as $groceryItem)
                <a href="{{route(($groceryItem->completed ?'groceries_item_undone':'groceries_item_done'),[$groceryList,$groceryItem])}}">
                    <div class="grocery__list container {{$groceryItem->completed ? 'done': ''}}">
                        <div class="grocery__list__header">
                            <div class=""><h2 class="mb-0">{{$groceryItem->name}}</h2></div>
                            <div class="text--right"><p class="">{{$groceryItem->size}}</p></div>
                            <div class="text--right"><input class="" type="checkbox" {{$groceryItem->completed ? 'checked': ''}}></div>
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
                                <p class="text--message">No items found, add a new one here</p>
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
        <h2 class="popup__title">Add an item</h2>
        <form action="{{route('groceries_item_store')}}" method="post">
            @csrf
            <div class="field__group">
                <label for="name">Ingredient</label><br>
                <input id="name" class="field field--text mb-xsm" type="text" name="name" placeholder="Flour" required>
            </div>
            <div class="field__group">
            <label for="size">Size</label><br>
            <input id="size" class="field field--int mb-lrg" type="text" name="size" placeholder="500 gram">
            </div>
            <input type="hidden" name="grocery_list" value="{{$groceryList->id}}">
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
