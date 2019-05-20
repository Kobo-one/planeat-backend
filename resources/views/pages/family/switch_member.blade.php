@extends('layouts.app')


@section('content')

<h1>Login</h1>

<form action="{{route('member_login')}}" method="POST">
    {{ csrf_field() }}
@foreach($members as $member)

        <input type="submit" value="{{$member->id}}" name="memberId" id="member{{$member->id}}">
        <label for="member{{$member->id}}">{{$member->name}}</label>

@endforeach
</form>
@endsection
