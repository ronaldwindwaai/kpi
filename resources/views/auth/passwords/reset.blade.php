@extends('layouts.auth')

@section('content')
<div class="auth-wrapper">
    <!-- [ reset-password ] start -->
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="SADC PF Logo" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">Reset your password</h4>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Email">Email address</label>
                                <input type="email" id="Email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                    autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button class="btn btn-block btn-primary mb-4">Reset password</button>
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
