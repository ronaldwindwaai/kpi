<!-- Checkbox Select table start -->
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>{{ $title }}</h5>
        </div>
        <div class="card-body">
            <div class="row align-items-center m-l-0">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ $page.'/create' }}"><button class="btn btn-success btn-sm btn-round has-ripple"
                            data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i> Add
                            {{ $form }}</button></a>
                    <!--<button type="button"id="delete-selected" class="btn btn-danger btn-sm btn-round has-ripple" data-toggle="modal"
                        data-target="#exampleModalLive">Delete Project</button>-->
                </div>
            </div>
            @if (!empty($data))

            <div class="dt-responsive table-responsive">
                <table id="fix-header" class="table table-striped table-bordered nowrap">

                    <thead>
                        <tr>
                            <!--<th><a href="javascript:;" class="select-all">Select All</a></th>-->
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $row)
                        <tr>

                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name}}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                @if(!empty($row->roles))
                                @foreach($row->roles as $v)
                                    <label class="badge badge-success">{{ ucwords($v->name) }}</label>
                                @endforeach
                                @endif
                            </td>

                            <td>
                                <a href="{{ route($page.'.edit',$row->id) }}" class="btn btn-info btn-sm"><i
                                        class="feather icon-edit"></i>&nbsp;Edit </a>
                                <a href="{{ route($page.'.show', $row->id) }}" title="show" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye icon-show"></i>&nbsp;Show
                                </a>
                                <form style="display:inline-block" id="delete-form{{ $row->id }}" action="{{ route($page.'.destroy', $row->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="confirm('Are you sure, you want to delete {{ ucfirst($row->name)}} ?')?document.getElementById('delete-form{{ $row->id }}').submit():''"
                                        class="btn btn-danger btn-sm">
                                        <i class="feather icon-trash-2"></i>&nbsp;Delete</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th></th>
                    </tfoot>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
<script>
    window.addEventListener('load', function () {
        $(".select-all").click(function () {
            if ($(".checkboxes").prop("checked") == true) {
                $(".checkboxes").prop("checked", false);
            } else if ($(".checkboxes").prop("checked") == false) {
                $(".checkboxes").prop("checked", true);
            }
        });

    })
</script>
@include('partial.modal.delete.delete-confirmation')
