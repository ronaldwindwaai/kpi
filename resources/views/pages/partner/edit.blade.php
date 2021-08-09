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
                                <label class="form-label" for="title">Title</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"  @error('title') aria-invalid="true" @enderror
                                    name="title" required placeholder="Name of the Resource" value="{{ $data->title }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="contact-person">Contact Person</label>
                                <input id="contact-person" type="text" class="form-control @error('contact_person') is-invalid @enderror"  @error('contact_person') aria-invalid="true" @enderror
                                    name="contact_person" required placeholder="Name of contact person" value="{{ $data->contact_person }}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="contact-details">Contact Details</label>
                                <input id="contact-details" type="text" class="form-control @error('contact_details') is-invalid @enderror"  @error('contact_details') aria-invalid="true" @enderror
                                    name="contact_details" required placeholder="Contact details" value="{{ $data->contact_details }}">
                            </div>
                        </div>
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
