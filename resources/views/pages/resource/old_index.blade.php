@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('css')
<!-- data tables css -->
<link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/select.bootstrap4.min.css') }}">
@endsection
@section('js')
<!-- datatable Js -->
<script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.select.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/data-select-custom.js')}}"></script>

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
<script>
    $(window).on('load', function () {
        function notify(message, type) {
            $.notify({
                message: message
            }, {
                type: type,
                allow_dismiss: true,
                label: 'Cancel',
                className: 'btn-xs btn-inverse',
                placement: {
                    from: 'top',
                    align: 'right'
                },
                delay: 2500,
                animate: {
                    enter: 'animated fadeInRight',
                    exit: 'animated fadeOutRight'
                },
                offset: {
                    x: 30,
                    y: 30
                }
            });
        };

@if (session('status'))
    notify('{{ session('status')}}','success');
@elseif($errors->any())
    @foreach($errors->all() as $error)
        notify('{{ $error}}','error');
    @endforeach
@endif
});
</script>
@endsection
@section('content')
@include('partial.table_list',[
    'title' =>  $title,
    'data'  =>  $data,
    'columns'  =>  $columns,
    'form' => 'Resource',
    'page' => 'resources',
])
@endsection
