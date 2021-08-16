<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Events\NewUserCreated;
use App\Events\UserAccountDeleted;

class UserController extends Controller
{
    private $user;
    private $page;

    public function __construct()
    {
        $this->user = new User();
        $this->page = 'users';
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        try {

            $this->authorize('viewAny', User::class);
            $users = User::with('roles')
                ->orderBy('name', 'asc')
                ->get();

            $title = 'List of Users';

            return view('pages.user.index')
                ->with('data', $users)
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
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        try {
            $this->authorize('create', User::class);

            $title = 'Add a Users';
            $roles = Role::all();

            return view('pages.user.add')
                ->with('roles', $roles)
                ->with('page', $this->page)
                ->with('title', $title);
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**

     * Store a newly created resource in storage.

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(StoreUserRequest $request)
    {

        try {

            $this->authorize('create', User::class);

            $validated = $request->validated();
            $validated['password'] = Hash::make($validated['password']);
            $user = new User($validated);
            $user->save();
            $role = Role::where('id', $validated['role_id'])->get();
            $user->assignRole($role);

            \event(new NewUserCreated($user));

            return \redirect()
                ->back()->withStatus('The  (' . strtoupper($user->name) . ') User was successfully created..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }



    /**

     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */

    public function show(User $user)
    {
        try {

            $this->authorize('view', $user);

            // $user = User::with('roles')->where('id', $user->id)->first();
            //$users = User::with('roles')->where('role_id', $user)->get();
            return view('pages.user.show',)
                ->with('data', $user)
                ->with('page', $this->page)
                ->with('title', $user->name);
        } catch (Exception $exception) {
            return \redirect()->back()->with('error', $exception->getMessage());
        }
    }



    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */

    public function edit(User $user)
    {
        try {

            $this->authorize('update', $user);

            $roles = Role::all();
            return view('pages.user.edit')
                ->with('data', $user)
                ->with('roles', $roles)
                ->with('page', $this->page)
                ->with('title', $user->name);
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
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateUserRequest $request, User $user)
    {

        try {

            $this->authorize('update', $user);

            $validated = $request->validated();

            if (!empty($validated['password'])) {
                $validated['password'] = Hash::make($validated['password']);
            } else {
                $validated = Arr::except($validated, array('password'));
            }

            $user->update($validated);

            DB::table('model_has_roles')->where('model_id', $user->id)->delete();

            $role = Role::where('id', $validated['role_id'])->get();
            $user->assignRole($role);

            return redirect()->route('users.index')->withStatus('The  (' . strtoupper($user->name) . ') User was successfully updated..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response

     */

    public function destroy(User $user)
    {

        try {

            $this->authorize('delete', $user);

            $name = $user->name;

            \event(new UserAccountDeleted($user));

            $user->delete();

            return \redirect()
                ->route('users.index')
                ->withStatus('Successfully deleted the (' . strtoupper($name) . ') User');
        } catch (Exception $exception) {
            return \redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
