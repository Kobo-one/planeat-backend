@extends('layouts.backend')

@section('content')

    @include('partials.errors')
    @include('partials.success')

    <div class="container backend">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Create <b>recipe</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('backend.recipes.index')}}">< Back</a>
                    </div>
                    <div class="col-sm-12 section">
                        <form action="{{route('backend.recipes.store')}}" method="POST">
                            @include('partials.backend.forms.recipes.create')
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
