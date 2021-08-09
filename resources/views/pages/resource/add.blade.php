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

@include('shared.message.error-reporting')
@endsection
@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ __('admin/resource/form.form_title') }}</h5>
            </div>
            <div class="card-body">
                <form id="validation-form123" action="{{ route('resources.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="title">{{__('admin/resource/form.title')}}</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"  @error('title') aria-invalid="true" @enderror
                                    name="title" required placeholder="{{ trans('admin/resource/form.place_holder.title') }}" value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="description">{{ __('admin/resource/form.description') }}</label>
                                <textarea class="form-control @error('title') is-invalid @enderror"  @error('title') aria-invalid="true" @enderror name="description" id="description"
                                    placeholder="{{ __('admin/resource/form.place_holder.description') }}">{{ old('description') }}</textarea>
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
@endsection
