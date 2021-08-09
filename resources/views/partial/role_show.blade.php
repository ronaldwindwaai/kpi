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
            </div>

            @if (!empty($data))
            <div class="dt-responsive table-responsive">
                <table class="table table-striped table-bordered nowrap">
                    <tbody>
                        <tr>
                            <td bgcolor="#dcd"><strong>Name</strong></td>
                            <td>{{ $data->name }}</td>
                        </tr>
                        <tr>
                            <td bgcolor="#dcd"><strong>Permissions</strong></td>
                             <td>
                                @foreach ($data->getAllPermissions() as $permission)
                                    {{ $permission->name }},
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-md-10">
                    <div class="form-group">
                        <a href="{{ route($page.'.index') }}" class="btn btn-info btn"><i
                                    class="feather icon-edit"></i>&nbsp;Back </a>
                        <a href="{{ route($page.'.edit',$data->id) }}" class="btn btn-info btn"><i
                                    class="feather icon-edit"></i>&nbsp;Edit </a>
                        <form style="display:inline-block" id="delete-form{{ $data->id }}" action="{{ route($page.'.destroy', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="#" onclick="confirm('Are you sure, you want to delete this programme?')?document.getElementById('delete-form{{ $data->id }}').submit():''" class="btn btn-danger btn">
                                <i class="feather icon-trash-2"></i>&nbsp;Delete</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
