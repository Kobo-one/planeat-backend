@extends('layouts.general')

@section('site-content')
    <div class="general tutorial">
        <img class="tutorial__image" src="{{asset('img/tutorial/tutorial'.$id.'.png')}}" alt="Tutorial step{{$id}} picture">
        <div class="tutorial__text">
            @yield('text')
        </div>
        <div class="tutorial__steps">
            @for ($i = 1; $i <= 4; $i++)
                <div class="step__ball{{$i == $id ? ' selected': '' }}"></div>
            @endfor

        </div>
        <a href="{{isset($route) ? $route: route('tutorial_index',$id+1)}}" class="btn btn--primary tutorial__next center">{{ucfirst($next)}}</a>
        @if($id!=1)
            <div class="mt-xsm">
                <a href="{{route('tutorial_index',$id-1)}}" > <span class="text--message">Back</span></a>
            </div>
        @endif
    </div>

@endsection

