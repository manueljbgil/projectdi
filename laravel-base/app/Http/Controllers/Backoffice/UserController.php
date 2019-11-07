<?php

namespace App\Http\Controllers\Backoffice;

use App\Role;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('bo.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::where('id', '>=', Auth::user()->role_id)->get();

        return view('bo.users.create')
            ->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|integer|exists:roles,id|min:' . Auth::user()->role->id
        ],
            [
                'role_id.min' => 'Cannot set selected role.'
            ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('user.index')
            ->withErrors(['success' => 'User created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('bo.users.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $roles = Role::where('id', '>=', Auth::user()->role_id)->get();

        return view('bo.users.edit')
            ->with('roles', $roles)
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:6|confirmed',
            'role_id' => 'required|integer|exists:roles,id|min:' . Auth::user()->role->id,
        ],
            [
                'role_id.min' => 'Cannot set selected role.'
            ]);

        $data = $request->only('name', 'email', 'password', 'role_id');
        if ($data['password'] != '')
            $data['password'] = Hash::make($data['password']);
        else
            unset($data['password']);

        $user->update($data);

        return back()->withErrors(['success' => 'User updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        return back()->withErrors(['success' => 'User blocked.']);
    }
}
