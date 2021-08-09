<script src="{{ asset('assets/js/plugins/bootstrap-notify.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/ac-notification.js')}}"></script>

@if ($errors->any())
<script>
    $(window).on('load', function () {
        function notify(message) {
            $.notify({
                message: message
            }, {
                type: 'warning',
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
        @foreach($errors->all() as $error)
            notify('{{ $error}}');
        @endforeach

    });
</script>
@endif
