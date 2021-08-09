@extends('layouts.auth')
@section('title')
Register
@endsection
@section('content')
<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="SADC PF Logo" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">Sign up</h4>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Username">Full Name</label>
                                <input type="text"  id="Username" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Email">Email address</label>
                                <input type="text" id="Email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">Password</label>
                                <input type="password" id="Password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <button class="btn btn-primary btn-block mb-4">Sign up</button>
                            <p class="mb-2">Already have an account? <a href="{{ route('login') }}"
                                    class="f-w-400">Signin</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signup ] end -->
@endsection
