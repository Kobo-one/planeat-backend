@extends('layouts.parent')

@section('header')
    @include('partials.adult.smallheader',['back'=>url()->previous(), 'title'=> 'Groceries','rightUrl'=>'#','icon' => 'img/icons/basic-plus-icon.svg','search'=>false])
@endsection

@section('site-content')


    <div class="section">

    </div>

@endsection


@section('popup')
    <div class="panel--shopping">
        <h2 class="popup__title">Create a shoppinglist</h2>
        <form action="{{route('groceries_store')}}" method="post">
            @csrf

            <input class="btn btn--primary" type="submit">

            <input class="btn btn--secondary" type="reset">
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
