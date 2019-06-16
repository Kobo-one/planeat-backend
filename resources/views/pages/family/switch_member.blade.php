@extends('layouts.general')

@section('site-content')

    <div class="section general flex flex-column flex-align-items-center flex-justify-between">

        <div class="pincode--underlay"></div>
        <div class="panel panel--shadow pincode text--center">
            <p>Enter your pin</p>
            <input type="password" pattern="[0-9]*" inputmode="numeric" class="field pincodeField mb-med">
            <button class="btn btn--primary mb-xsm">Submit</button>
        </div>

        <div class="container user-switch">
            <h1 class="mb-med">Choose your profile</h1>

            <form action="{{route('member_login')}}" method="POST" class="users">
                {{ csrf_field() }}
                <div class="grid grid--2-col">
                    <input type="hidden" name="pincode" value="">
                    @foreach($members as $member)
                        <div class="grid__item">
                            <input type="submit" value="{{$member->id}}" name="memberId" id="member{{$member->id}}" class="hidden">
                            <label for="member{{$member->id}}" class="{{$member->hasRole('Parent')?'parentMember':'' }}">
                                <div class="panel panel--shadow user-switcher">
                                    <img src="{{asset($member->avatar->img)}}" alt="{{$member->name}}'s avatar">
                                </div>
                                <div class="mt-xsm mb-0">{{$member->name}}</div>
                                <small class="text--message">{{$member->role()}}</small>
                            </label>
                        </div>
                    @endforeach
                </div>

            </form>
        </div>

        <div class="logout">
            <a href="{{route('logout')}}" class="btn text--danger flex flex-align-items-center justify-content-center"><img class="mr-xsm" src="{{asset('img/icons/logout-icon.svg')}}" alt="logout"><span>Logout</span></a>
        </div>

    </div>

@endsection

@push('script')
    <script>
        $('.parentMember').click(function (e) {
            e.preventDefault();
            var btn = $(this).attr('for');
            $btn = $('#'+btn);
            $underlay= $('.pincode--underlay');
            $pincode = $('.pincode');
            $pincode.show();
            $underlay.show();

            $('.pincodeField').focus();

            $underlay.click(function (e) {
                $(this).hide();
                $pincode.hide();
            });

            $pincode.find('button').click(function (e) {
                $pincode = $('.pincodeField').val();
                if ($pincode) {
                    $('input[name="pincode"]').val($pincode);
                    $btn.trigger('click');
                }
            })
        })
    </script>
@endpush
