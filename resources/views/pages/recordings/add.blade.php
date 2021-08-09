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
                <form id="form" action="{{ route($page.'.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="title">Title</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"  @error('title') aria-invalid="true" @enderror
                                    name="title" required placeholder="Name of the Programme" value="{{ old('title') }}">
                            </div>
                        </div>
                        @if (!empty($meetings))
                        <div class="col-md-10">
                            <div class="form-group">
                            <h5>Meeting</h5>
                            <p>Kindly select the meeting this recordings was taken from.</p>
                            <select class="js-example-basic-multiple col-md-6" name="meeting_id">
                                @foreach ($meetings as $meeting)
                                    <option value="{{ $meeting->id }}">{{ $meeting->title }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="url-recording">URL Recording</label>
                                <input id="url-recording" type="text" class="form-control @error('url_recording') is-invalid @enderror"  @error('url_recording') aria-invalid="true" @enderror
                                    name="url_recording" required placeholder="URL of the recordings" value="{{ old('url_recording') }}">
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="credentials">Credentials</label>
                                <textarea class="form-control @error('credentials') is-invalid @enderror"  @error('credentials')  aria-invalid="true" @enderror name="credentials" id="credentials"
                                    placeholder="Credentials">{{ old('credentials') }}</textarea>
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
