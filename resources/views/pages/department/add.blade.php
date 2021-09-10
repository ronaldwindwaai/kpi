@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css') }}">
@endsection
@section('js')
    <!-- jquery-validation Js -->
    <script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
    <!-- form-picker-custom Js -->
    <script src="{{ asset('assets/js/pages/form-validation.js') }}"></script>
    <!-- select2 Js -->
    <script src="{{ asset('assets/js/plugins/select2.full.min.js') }}"></script>
    <!-- form-select-custom Js -->
    <script src="{{ asset('assets/js/pages/form-select-custom.js') }}"></script>
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
                    <form id="form" action="{{ route($page . '.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="form-label"
                                        for="name">{{ __('admin/department/form.name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        @error('name') aria-invalid="true" @enderror name="name" required
                                        placeholder="{{ __('admin/department/form.place_holder.name') }}"
                                        value="{{ old('name') }}">
                                </div>
                            </div>
                            @role('super-admin')
                            @if (!empty($managers))

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <h5>{{ __('admin/department/form.manager') }}</h5>
                                        <p>{{ __('admin/department/form.place_holder.manager') }}</p>
                                        <select class="js-example-basic-multiple col-md-6" name="manager_id">
                                            @foreach ($managers as $manager)
                                                <option value="{{ $manager->id }}">
                                                    {{ $manager->first_name . ' ' . $manager->last_name }}</option>
                                            @endforeach
                                        </select>

                                        <button type="button" class="btn btn-sm  btn-outline-primary has-ripple"
                                            data-toggle="modal" data-target="#modal-new-manager">New</button>

                                    </div>
                                </div>
                            @endif
                            @endrole
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="form-label"
                                        for="description">{{ __('admin/department/form.description') }}</label>
                                    <textarea class="form-control @error('title') is-invalid @enderror"
                                        @error('description') required aria-invalid="true" @enderror name="description"
                                        id="description"
                                        placeholder="{{ __('admin/department/form.place_holder.description') }}">{{ old('description') }}</textarea>
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
    @include('partial.modal.user.index')
    @endrole
@endsection
