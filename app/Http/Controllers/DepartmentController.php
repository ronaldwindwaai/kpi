<?php

namespace App\Http\Controllers;

use App\Http\Requests\Department\StoreDepartmentRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;
use Exception;
use App\Models\Department;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class DepartmentController extends Controller
{
    private $department;
    private $page;

    public function __construct()
    {
        $this->department = new Department();
        $this->page =   'department';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Department $departments)
    {
        $this->authorize('viewAny', Department::class);
        $title = __('admin/department/table.table_title');

        /*$projects = DB::table('projects')
            ->select('id','title', 'date_from', 'date_to', 'created_at')
            ->get();*/

        return view('pages.department.index')
            ->with('data', $departments->get_all_departments())
            ->with('columns', $departments->get_columns())
            ->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $this->authorize('create', Department::class);
            $title = __('admin/department/form.form_title');
            $managers = Role::whereIn('name', ['super-admin'])
                ->first()->users()->get();
            $roles = Role::all();

            return view('pages.department.add')
                ->with('page', $this->page)
                ->with('title', $title)
                ->with('roles', $roles)
                ->with('managers', $managers);
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        try {

            $validated = $request->validated();

            $department = new Department($validated);
            $department->save();

            return \redirect()
                ->route('department.index')
                ->withStatus(__(
                    'admin/department/message.success',
                    [
                        'name' => strtoupper($department->name),
                        'method' => 'created'
                    ]
                ));
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors(__(
                    'admin/department/message.error',
                    ['error' => $exception->getMessage()]
                ));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $this->authorize('view', $department);

       // dd($department->get_manager());

        try {
            $title = __('admin/department/form.form_title');
            $name = $department->name;
            $columns    =   $this->department->get_columns();

            return view('pages.department.show')
                ->with('data', $department)
                ->with('columns', $columns)
                ->with('title', $title)
                ->with('page', $this->page)
                ->with('name', $name);
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors(__(
                    'admin/department/message.error',
                    ['error' => $exception->getMessage()]
                ));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $this->authorize('update', $department);

        try {

            $title = $department->name;
            $managers = Role::whereIn('name', ['super-admin'])
                ->first()->users()->get();
            $roles = Role::all();

            return view('pages.department.edit')
                ->with('data', $department)
                ->with('page', $this->page)
                ->with('managers', $managers)
                ->with('roles', $roles)
                ->with('title', $title);
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $this->authorize('update', $department);

        try {

            $validated = $request->validated();
            $department->fill($validated);
            $department->save();

            return \redirect()
                ->back()
                ->withStatus(__(
                    'admin/department/message.success',
                    [
                        'name' => strtoupper($department->name),
                        'method' => 'created'
                    ]
                ));
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors(__(
                    'admin/department/message.error',
                    ['error' => $exception->getMessage()]
                ));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $this->authorize('delete', $department);

        try {
            $department_name = $department->name;
            $department->delete();

            return \redirect()
            ->route('department.index')
            ->withStatus(__(
                'admin/department/message.success',
                [
                    'name' => strtoupper($department_name),
                    'method' => 'deleted'
                ]
            ));
    } catch (Exception $exception) {
        return \redirect()
            ->back()
            ->withErrors(__(
                'admin/department/message.error',
                ['error' => $exception->getMessage()]
            ));
    }
    }
}
