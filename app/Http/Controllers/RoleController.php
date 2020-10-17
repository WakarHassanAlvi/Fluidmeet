<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index', [
            'roles'=>Role::all()
            ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required']
        ]);

        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')
            ]);
            
        //toastr is a library to display error or success messages.
        toastr()->success('Role "'.request('name').'" has been successfully added.', 'Role Added', ['timeOut' => 7000]);
        return back();
    }

    public function edit(Role $role)
    {
        //dd($role);
        return view('admin.roles.edit', ['role'=>$role]);
    }

    public function update(Role $role)
    {
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'))->slug('-');

        if($role->isDirty('name'))//to detect if the value is changed by user
        {
            $role->save();
            toastr()->success('Role "'.$role->name.'" has been successfully updated.', 'Role Updated', ['timeOut' => 7000]);
            return redirect()->route('roles.index');
        }
        else
        {
            toastr()->warning('There is nothing to update.', 'Nothing to Update', ['timeOut' => 7000]);
            return back();
        }
    }

    public function destroy(Role $role)
    {
        $role->delete();
        //session()->flash('role_deleted', 'Role "'.$role->name.'" has been deleted.');

        toastr()->error('Role "'.$role->name.'" has been successfully deleted.', 'Role Deleted', ['timeOut' => 7000]);

        return back();
    }
}
