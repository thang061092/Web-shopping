@extends('layouts.app')

@section('content')
    <div id="logreg-forms">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            <input id="inputEmail" placeholder="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <input id="password" placeholder="password" type="password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i>   {{ __('Login') }}</button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

            <hr>
            @if (Route::has('register'))
                <a class="nav-link btn btn-primary  btn-block text-white" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>{{ __('Register') }}</a>
            @endif
        </form>
    </div>

@endsection
