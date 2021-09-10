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
                    <form id="form" action="{{ route($page . '.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        @error('name') aria-invalid="true" @enderror name="name" required
                                        placeholder="Name of the Department" value="{{ $data->name }}">
                                </div>
                            </div>
                            @if (!empty($managers))

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <h5>Manager</h5>
                                        <p>Kindly assign the Manager responsible for this Department.</p>
                                        <select class="js-example-basic-multiple col-md-6" name="manager_id">
                                            @foreach ($managers as $manager)
                                                <option {{ ($data->manager_id === $manager->id)?'selected':'' }}value="{{ $manager->id }}">
                                                    {{ $manager->first_name . ' ' . $manager->last_name }}</option>
                                            @endforeach
                                        </select>
                                        @role('super-admin')
                                        <button type="button" class="btn btn-sm  btn-outline-primary has-ripple"
                                            data-toggle="modal" data-target="#modal-new-manager">New</button>
                                        @endrole
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control @error('title') is-invalid @enderror"
                                        @error('description') required aria-invalid="true" @enderror name="description"
                                        id="description"
                                        placeholder="Programme Description">{{ $data->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn  btn-primary">Update</button>
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
