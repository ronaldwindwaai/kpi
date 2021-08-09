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
                <form id="form" action="{{ route($page.'.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label" for="file">Upload file</label>
                               <input type="file" name="file" id="file" required/>
                            </div>
                        </div>
                        @if (!empty($meetings))
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Meeting</h5>
                                <p>Kindly select the meeting</p>
                                <select class="js-example-basic-multiple col-md-6" name="meeting_id">
                                    @foreach ($meetings as $meeting)
                                    <option value="{{ $meeting->id }}">{{ $meeting->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                     </div>
                    <button type="submit" class="btn  btn-primary">Upload</button>
                </form>
            </div>

        </div>
    </div>
    <!-- [ Form Validation ] end -->
</div>
<!-- [ Main Content ] end -->
@endsection
