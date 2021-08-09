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
                            data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i> {{ __('admin/menu.navigation.'.strtolower($form).'.add') }}</button></a>
                    <!--<button type="button"id="delete-selected" class="btn btn-danger btn-sm btn-round has-ripple" data-toggle="modal"
                        data-target="#exampleModalLive">Delete Project</button>-->
                </div>
            </div>
            @if (!empty($data))
            <div class="dt-responsive table-responsive">
                <table id="fix-header" class="table table-striped table-bordered nowrap">
                    @if (!empty($columns))
                    <thead>
                        <tr>
                            <!--<th><a href="javascript:;" class="select-all">Select All</a></th>-->
                            @foreach ($columns as $column)
                                <th>{{ strtoupper (__('admin/table.'.$column)) }}</th>
                            @endforeach
                            <th></th>
                        </tr>
                    </thead>
                    @endif
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <!--<td><input type="checkbox" class="checkboxes" name="id[]" value="{{ $row->id }}" /></td>-->
                            @foreach ($columns as $column)
                                <td>{{ $row->$column }}</td>
                            @endforeach
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
                                    <a href="#" onclick="confirm('{{ __('admin/table.confirm_delete',['name'=> Str::singular($page) ]) }}')?document.getElementById('delete-form{{ $row->id }}').submit():''"
                                        class="btn btn-danger btn-sm">
                                        <i class="feather icon-trash-2"></i>&nbsp;Delete</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <!--<th><a href="javascript:;" class="select-all">SELECT ALL</a></th>-->
                        @foreach ($columns as $column)
                         <th>{{ strtoupper (__('admin/table.'.$column)) }}</th>
                        @endforeach
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
