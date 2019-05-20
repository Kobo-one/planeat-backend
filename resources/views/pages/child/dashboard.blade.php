@extends('layouts.parent')


@section('site-content')

<div class="dashboard">
    Hi {{Auth::user()->name}}, child
</div>

@endsection
