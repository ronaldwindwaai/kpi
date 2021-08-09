@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('css')
<!-- data tables css -->
<link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/fixedHeader.bootstrap4.min.css') }}">
@endsection
@section('js')
<!-- datatable Js -->
<script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.colReorder.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/data-header-custom.js')}}"></script>
@include('shared.message.message-reporting')
@endsection
@section('content')
<?php $route_name = explode('.',Route::currentRouteName());?>
@include('partial.table_list',[
    'title'     =>  $title,
    'data'      =>  $data,
    'columns'   =>  $columns,
    'form'      =>  'programmes',
    'page'      =>  'programmes',
])
@endsection
