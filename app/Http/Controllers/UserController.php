<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user,
            'roles'=>Role::all()
            ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $inputs = request()->validate([

            //'username' => ['required','string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['file'],
            //'password' => ['max:255', 'min:8', 'confirmed'],//confirmed is for password confirmation

        ]);

        if(request('avatar'))
        {
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);
        session()->flash('user_updated', 'User '.$user->name.' has been updated.');
        return back();        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function attachRole(User $user)
    {
        $user->roles()->attach(request('role'));

        return back();
    }

    public function detachRole(User $user)
    {
        $user->roles()->detach(request('role'));

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('user_deleted', 'User '.$user->name.' has been deleted.');

        return back();
    }

}
