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

<script src="{{ asset('assets/js/plugins/bootstrap-notify.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/ac-notification.js')}}"></script>

@include('shared.message.error-reporting')

@endsection
@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ Form Validation ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
            </div>
            <div class="card-body">
                <form id="validation-form123" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="programme-title">Programme Title</label>
                                <input id="programme-title" type="text" class="form-control @error('programme_title') is-invalid @enderror" name="programme_title" required placeholder="Name of the Programme">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="project-title">Project Title</label>
                                <input id="project-title" type="text" class="form-control" name="project_title" placeholder="Title of the Project" required>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="activity-name">Activity Name</label>
                                <input id="activity-name" type="text" class="form-control" name="activity_name" placeholder="Name of the Activity" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="date-from">Proposed Date From</label>
                                <input id="date-from" type="date" class="form-control" name="date_from" placeholder="Proposed date from.." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="date-to">Proposed Date To</label>
                                <input id="date-to" type="date" class="form-control" name="date_to" placeholder="Proposed date to.." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="venue">Venue</label>
                                <input type="text" class="form-control" name="venue" placeholder="Venue" required>
                            </div>
                        </div>
                        @if (!empty($resources))
                        <div class="col-md-10">
                            <h5>Resources</h5>
                            <p>Kindly select the resources that you will need</p>
                            <select class="js-example-basic-multiple col-md-6" multiple="multiple" name="resource_id[]">
                                @foreach ($resources as $resource)
                                <option value="{{ $resource->id }}">{{ $resource->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label" for="venue">Meeting Objectives</label>
                                <textarea class="form-control" name="objective" placeholder="Meeting Objectives"></textarea>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label">Upload Documentation</label>
                                <div>
                                    <input type="file" name="file" class="validation-file">
                                </div>
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
