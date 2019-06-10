@extends('layouts.general')

@section('site-content')

    <div class="general">
        <div class="container">
        <div class=" panel panel--shadow  user-switch">
            <a class=" spacer spacer--lrg" href="{{route('home')}}"><img class="login-logo" src="{{asset('img/icon-logo.svg')}}" alt="Planeat logo"></a>
            <form class="spacer spacer--lrg" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="container">


                    <div class="text--left ">
                        <label for="email" class="field--label">E-Mail</label> <br>
                        <input id="email" type="email" class="field field--text width-100" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="container">


                    <div class="text--left">
                        <label for="password" class="field--label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="field field--text width-100" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="width-100 text--right">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    <small class="text--message" >Forgot Your Password?</small>
                                </a>
                            @endif
                        </div>

                    </div>
                </div>


                <div class="form-group row hidden">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} checked>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                    <div class="section mt-lrg">
                        <button type="submit" class="btn btn--primary">
                            {{ __('Login') }}
                        </button>


                    </div>
            </form>
        </div>
    </div>
    </div>

@endsection
