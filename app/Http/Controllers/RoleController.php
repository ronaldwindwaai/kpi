<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $role;
    private $page;

    public function __construct()
    {
        $this->role = new Role();
        $this->page = 'roles';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        try {

            
            $roles = Role::with('permissions')->get();

            $title = 'List of roles';

            return view('pages.role.index')
                ->with('data', $roles)
                ->with('page', $this->page)
                ->with('title', $title);

        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        try {
            $title = 'Add a Role';

            $permissions = Permission::all();

            return view('pages.role.add')
                ->with('permissions',$permissions)
                ->with('page',$this->page)
                ->with('title', $title);

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

    public function store(StoreRoleRequest $request)
    {
        try {

            $validated = $request->validated();

            $role = new Role($validated);
            $role->save();
            $role->givePermissionTo($validated['permission_id']);

            return \redirect()
                ->route('roles.index')->withStatus('The  (' . strtoupper($role->name) . ') Role was successfully created..');
        } catch (Exception $exception) {
            dd($exception);
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */

    public function show(Role $role)
    {
        try {

            // $user = User::with('roles')->where('id', $user->id)->first();
            //$users = User::with('roles')->where('role_id', $user)->get();
            return view('pages.role.show',)
                ->with('data', $role)
                ->with('page', $this->page)
                ->with('title', $role->name);

        } catch (Exception $exception) {
            return \redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */

    public function edit(Role $role)
    {
        try {
            $permissions = Permission::all();

            $role_permissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                ->all();

            return view('pages.role.edit')
                ->with('data', $role)
                ->with('permissions', $permissions)
                ->with('page', $this->page)
                ->with('role_permissions', $role_permissions)
                ->with('title', $role->name);

        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }



    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateRoleRequest $request, Role $role)
    {
        try {

            $validated = $request->validated();
            $role->update($validated);

            $role->syncPermissions($validated['permission_id']);

            return redirect()->route('roles.index')->withStatus('The  (' . strtoupper($role->name) . ') Role was successfully updated..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }





    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */

    public function destroy(Role $role)
    {
        try {
            $name = $role->name;
            $role->delete();

            return \redirect()
                ->route('roles.index')
                ->withStatus('Successfully deleted the (' . strtoupper($name) . ') Role');
        } catch (Exception $exception) {
            return \redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
