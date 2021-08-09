@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="auth-wrapper">
    <!-- [ reset-password ] start -->
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="SADC PF Logo" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">{{ __('Please confirm your password before continuing.') }}</h4>
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="floating-label" for="password">{{ __('Password') }}</label>
                                <input type="password" id="password"
                                    class="form-control @error('email') is-invalid @enderror" name="password"
                                    value="{{ $email ?? old('password') }}" required autocomplete="password" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button class="btn btn-block btn-primary mb-4">Confirm Password</button>
                            <p class="mb-0 text-muted">Don’t have an account? <a href="{{ route('register') }}"
                                    class="f-w-400">Signup</a></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ reset-password ] end -->
</div>
@endsection
