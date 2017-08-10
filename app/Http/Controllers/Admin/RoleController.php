<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:30|unique:roles',
            'slug' => 'required|string|max:30|unique:roles',
            'description' => 'max:200'
        ]);
    }

    public function createRoleForm()
    {
        $pageTitle = "Create Role";
        return view('admin.role.create');
    }

    public function updateRoleForm($role)
    {
        $pageTitle = "Update Role";

        $permissions = [];
        foreach(Permission::all() as $permission) {
            $parts = explode('.',$permission->slug);
            $permissions[ucfirst($parts[0])][] = ['access'=> ucfirst($parts[1]), 'description'=>$permission->description];
        }
        return view('admin.role.update', compact('role', 'permissions'));
    }

    public function create(Request $request)
    {
        $input = $request->all();

        // Check if the form is valid
        $validator = $this->validator($input);
        if ($validator->fails())
            return redirect()->route('admin.role.create')->withErrors($validator)->withInput();

        Role::create([
            'name' => $input['name'],
            'slug' => $input['slug'],
            'description' => $input['description']
        ]);

        return redirect()->route('admin.dashboard')->withSuccess('Successfully created the role ' . $input['name'] . '.');
    }

    public function update(Request $request, Role $role)
    {
        $input = $request->all();
        $this->redirectIfValidationFail($input);

        $role->update([
            'name' => $input['name'],
            'slug' => $input['slug'],
            'description' => $input['description']
        ]);

        // Get the new permissions
        $permissions = is_null(Input::get('permissions')) ? [] : Permission::whereIn('slug', array_keys(Input::get('permissions')))->pluck('id')->all();
        $role->permissions()->sync($permissions);
        $role->save();

        return \Redirect::route('admin.dashboard')->withSuccess('The role ' . $role->name . ' has been successfully updated.');
    }

    public function delete(Role $role)
    {
        $name = $role->name;
        $role->delete();
        return redirect()->route('admin.dashboard')->withSuccess('The role ' . $name . ' was successfully deleted.');
    }
}
