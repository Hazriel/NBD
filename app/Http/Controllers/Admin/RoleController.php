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
            'name' => 'required|string|max:30',
            'slug' => 'required|string|max:30',
            'description' => 'max:200'
        ]);
    }

    private function getPermissions()
    {
        $permissions = [];
        foreach(Permission::all() as $permission) {
            $parts = explode('.',$permission->slug);
            $permissions[ucfirst($parts[0])][] = ['access'=> ucfirst($parts[1]), 'description'=>$permission->description];
        }
        return $permissions;
    }

    public function createRoleForm()
    {
        $pageTitle = "Admin";
        $permissions = $this->getPermissions();
        return view('admin.role.create', compact('pageTitle', 'permissions'));
    }

    public function updateRoleForm($role)
    {
        $pageTitle = "Admin";
        $permissions = $this->getPermissions();
        return view('admin.role.update', compact('pageTitle', 'role', 'permissions'));
    }

    public function create(Request $request)
    {
        $input = $request->all();

        // Check if the form is valid
        $validator = $this->validator($input);
        if ($validator->fails())
            return redirect()->route('admin.role.create')->withErrors($validator)->withInput();

        $role = Role::create([
            'name' => $input['name'],
            'slug' => $input['slug'],
            'description' => $input['description'],
            'category_view_power' => $input['category_view_power'],
            'forum_view_power' => $input['forum_view_power'],
            'topic_create_power' => $input['topic_create_power'],
            'topic_update_power' => $input['topic_update_power'],
            'topic_delete_power' => $input['topic_delete_power'],
            'post_create_power' => $input['post_create_power'],
            'post_update_power' => $input['post_update_power'],
            'post_delete_power' => $input['post_delete_power'],
        ]);

        $permissions = is_null(Input::get('permissions')) ? [] : Permission::whereIn('slug', array_keys(Input::get('permissions')))->pluck('id')->all();
        $role->permissions()->sync($permissions);

        return redirect()->route('admin.dashboard')->withSuccess('Successfully created the role ' . $input['name'] . '.');
    }

    public function update(Request $request, Role $role)
    {
        $input = $request->all();

        // Check if the form is valid
        $validator = $this->validator($input);
        if ($validator->fails())
            return redirect()->route('admin.role.create')->withErrors($validator)->withInput();

        $role->update([
            'name' => $input['name'],
            'slug' => $input['slug'],
            'description' => $input['description'],
            'category_view_power' => $input['category_view_power'],
            'forum_view_power' => $input['forum_view_power'],
            'topic_create_power' => $input['topic_create_power'],
            'topic_update_power' => $input['topic_update_power'],
            'topic_delete_power' => $input['topic_delete_power'],
            'post_create_power' => $input['post_create_power'],
            'post_update_power' => $input['post_update_power'],
            'post_delete_power' => $input['post_delete_power'],
        ]);

        // Get the new permissions
        $permissions = is_null(Input::get('permissions')) ? [] : Permission::whereIn('slug', array_keys(Input::get('permissions')))->pluck('id')->all();
        $role->permissions()->sync($permissions);
        $role->save();

        return redirect()->route('admin.dashboard')->withSuccess('The role ' . $role->name . ' has been successfully updated.');
    }

    public function delete(Role $role)
    {
        $name = $role->name;
        // First detach the role from its users and permissions
        $role->users()->detach();
        $role->permissions()->detach();
        // Delete after
        $role->delete();
        return redirect()->route('admin.dashboard')->withSuccess('The role ' . $name . ' was successfully deleted.');
    }
}
