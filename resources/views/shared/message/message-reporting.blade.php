<!-- Notofication Js -->
<script defer src="{{ asset('assets/js/plugins/bootstrap-notify.min.js')}}"></script>
<script defer>
$(window).on('load', function () {
    function notify(message, type) {
        $.notify({message: message}, {
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
});
@if(session('status'))
        notify('{{ session('status')}}', 'success');
    @elseif($errors->any())
        @foreach($errors->all() as $error)
            notify('{{ $error}}', 'danger');
        @endforeach
    @endif
</script>
