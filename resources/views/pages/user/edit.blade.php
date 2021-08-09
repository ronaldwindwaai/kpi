@extends('layouts.app')
@section('title')
{{ $title }}
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css')}}">
@endsection
@section('js')
<!-- jquery-validation Js -->
<script src="{{ asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
<!-- form-picker-custom Js -->
<script src="{{ asset('assets/js/pages/form-validation.js')}}"></script>
<!-- select2 Js -->
<script src="{{ asset('assets/js/plugins/select2.full.min.js')}}"></script>
<!-- form-select-custom Js -->
<script src="{{ asset('assets/js/pages/form-select-custom.js')}}"></script>

@include('shared.message.message-reporting')

@endsection
@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
            </div>
            <div class="card-body">
                <form id="form" action="{{ route($page.'.update',$data->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  @error('name') aria-invalid="true" @enderror
                                    name="name" required placeholder="Name of User" value="{{ $data->name }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  @error('email') aria-invalid="true" @enderror
                                    name="email" required placeholder="Email Address" value="{{ $data->email }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  @error('password') aria-invalid="true" @enderror
                                    name="password" placeholder="Password" value="">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="confirm-password">Confirm Password</label>
                                <input id="confirm-password" type="password" class="form-control @error('confirm-password') is-invalid @enderror"  @error('confirm-password') aria-invalid="true" @enderror
                                    name="confirm-password" placeholder="Password" value="">
                            </div>
                        </div>
                        @if (!empty($roles))
                        <div class="col-md-10">
                            <div class="form-group">
                            <h5>Role</h5>
                            <p>Kindly choose the role of this user.</p>
                            <?php  $user_roles = $data->getRoleNames()->toArray(); ?>
                            <select class="js-example-basic-multiple col-md-6" name="role_id">
                                @foreach ($roles as $role)
                                    <option {{ in_array($role->name, $user_roles)?'selected' :'' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        @endif
                    </div>
                    <button type="submit" class="btn  btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ Form Validation ] end -->
</div>
<!-- [ Main Content ] end -->
@endsection
