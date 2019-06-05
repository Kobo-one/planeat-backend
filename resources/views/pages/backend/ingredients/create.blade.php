@extends('layouts.backend')

@section('content')


    <div class="container backend">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Create <b>ingredient</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('backend.ingredients.index')}}">< Back</a>
                    </div>
                    <div class="col-sm-12 section">
                        <form action="{{route('backend.ingredients.store')}}" method="POST" enctype="multipart/form-data">
                            @include('partials.backend.forms.ingredients.create')
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
