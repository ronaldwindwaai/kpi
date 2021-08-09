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
                <form id="form" action="{{ route($page.'.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="title">{{ __('admin/programme/form.title') }}</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"  @error('title') aria-invalid="true" @enderror
                                    name="title" required placeholder="{{ __('admin/programme/form.place_holder.title') }}" value="{{ old('title') }}">
                            </div>
                        </div>
                        @if (!empty($managers))
                        <div class="col-md-10">
                            <div class="form-group">
                            <h5>{{ __('admin/programme/form.manager') }}</h5>
                            <p>{{ __('admin/programme/form.place_holder.manager') }}</p>
                                <select class="js-example-basic-multiple col-md-6" name="manager_id">
                                    @foreach ($managers as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                    @endforeach
                                </select>
                                @role('super-admin')
                                   <button type="button" class="btn btn-sm  btn-outline-primary has-ripple" data-toggle="modal" data-target="#modal-new-manager">New</button>
                                @endrole
                            </div>
                        </div>
                        @endif
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="description">{{ __('admin/programme/form.description') }}</label>
                                <textarea class="form-control @error('title') is-invalid @enderror"  @error('description') required aria-invalid="true" @enderror name="description" id="description"
                                    placeholder="{{ __('admin/programme/form.place_holder.description') }}">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn  btn-primary">{{ __('admin/form.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ Form Validation ] end -->
</div>
<!-- [ Main Content ] end -->
@role('super-admin')
<div class="modal fade" id="modal-new-manager" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add A User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="user-modal-form" action="{{ route('users.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  @error('name') aria-invalid="true" @enderror
                                    name="name" required placeholder="Name of User" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  @error('email') aria-invalid="true" @enderror
                                    name="email" required placeholder="Email Address" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  @error('password') aria-invalid="true" @enderror
                                    name="password" required placeholder="Password" value="{{ old('password') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="confirm-password">Confirm Password</label>
                                <input id="confirm-password" type="password" class="form-control @error('confirm-password') is-invalid @enderror"  @error('confirm-password') aria-invalid="true" @enderror
                                    name="confirm-password" required placeholder="Password" value="{{ old('confirm-password') }}">
                            </div>
                        </div>
                        @if (!empty($roles))
                        <div class="col-md-10">
                            <div class="form-group">
                            <h5>Role</h5>
                            <p>Kindly choose the role of this user.</p>
                            <select class="col-md-6" name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        @endif
                    </div>
                    <button type="submit" class="btn  btn-primary">Submit</button>
                    <button type="buton" data-dismiss="modal" class="btn btn-outline-secondary has-ripple">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endrole
@endsection
