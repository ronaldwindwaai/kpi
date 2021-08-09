<div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Woow, are you sure</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="modal-delete-button" class="btn  btn-danger"
                    data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('load', function () {
        var selected = [];
        $('#modal-delete-button').click(function () {
            $('.checkboxes').each(function () {
                if ($(".checkboxes").prop("checked") == true) {
                    selected.push($(".checkboxes").val());
                }
                //console.log(selected);
            });

            $.ajax({
                url: "{{ url("http://localhost/programmes/") }}"+selected.join(),
               type: 'DELETE',
                dataType: "json",
                data: {
                    'ids[]': selected.join(),
                    "_method": 'DELETE',
                    "_token":'{{ csrf_token() }}',
                },
                success: function (data) {
                    console.log('Success')
                },

            })
             console.log("It failed");
        })
    });

</script>
