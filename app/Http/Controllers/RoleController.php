<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
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

    private function redirectIfValidationFail($input)
    {
        $validator = $this->validator($input);
        if ($validator->fails())
            return redirect()->route('admin.role.create')->withErrors($validator)->withInput();
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $this->redirectIfValidationFail($input);

        Role::create([
            'name' => $input['name'],
            'slug' => $input['slug'],
            'description' => $input['description']
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Successfully created the role ' . $input['name'] . '.');
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

        return redirect()->route('admin.dashboard')->with('success', 'Role ' . $role->name . ' was successfully updated.');
    }

    public function delete(Role $role)
    {
        $name = $role->name;
        $role->delete();
        return redirect()->route('admin.dashboard')->with('success', 'The role ' . $name . ' was successfully deleted.');
    }
}
