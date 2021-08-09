@extends('layouts.auth')
@section('title')
Login
@endsection
@section('content')
<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="SADC PF Logo" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">{{ __('login.title') }}</h4>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Email">{{ __('login.email_address') }}</label>
                                <input type="email" id="Email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">{{ __('login.password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">{{ __('login.submit') }}</label>
                            </div>

                            <button class="btn btn-block btn-primary mb-4">Signin</button>
                            @if (Route::has('password.request'))
                            <p class="mb-2 text-muted"><a href="{{ route('password.request') }}"
                                    class="f-w-400">{{ __('login.forgot_password') }}</a></p>
                            </a>
                            @endif
                            <p class="mb-0 text-muted"><a href="{{ route('register') }}"
                                    class="f-w-400">{{ __('login.signup') }}</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->
@endsection
