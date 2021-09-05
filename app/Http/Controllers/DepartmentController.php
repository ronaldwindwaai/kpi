<?php

namespace App\Http\Controllers;

use App\Http\Requests\Department\StoreDepartmentRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;
use Exception;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index()
    {
        $this->authorize('viewAny', Department::class);
        $title = __('admin/department/table.table_title');

        /*$projects = DB::table('projects')
            ->select('id','title', 'date_from', 'date_to', 'created_at')
            ->get();*/
        $departments = DB::table('departments')
            ->join('users', 'departments.manager_id', '=', 'users.id')
            ->select('departments.id', 'departments.name', DB::raw("CONCAT(users.first_name,' ',users.last_name) as manager"), 'departments.created_at')
            ->get();

        $columns    =   $this->department->get_columns();

        return view('pages.department.index')
            ->with('data', $departments)
            ->with('columns', $columns)
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
        //
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
    }
}
