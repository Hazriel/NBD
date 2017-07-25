<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:30|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'string|min:6|confirmed',
        ]);
    }

    private function redirectIfValidationFail($input)
    {
        $validator = $this->validator($input);
        if ($validator->fails())
            return redirect()->route('admin.role.create')->withErrors($validator)->withInput();
    }
    public function userList(Request $request, $page)
    {
        $firstIndex = ($page - 1) * 10;
        $lastIndex = $page * 10;
        $users = User::all()->sortByDesc('created_at')->slice($firstIndex, $lastIndex);
        return view('admin.user.list', compact('users'));
    }

    public function updateForm($user)
    {
        $user = User::find($user);
        foreach (Role::all() as $role)
        {
            $roles[$role->id] = $role->name;
        }
        return view('admin.user.update', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $input = $request->all();
        $this->redirectIfValidationFail($input);

        $user->update([
            'username'   => $input['username'],
            'email'      => $input['email'],
            'birth_date' => $input['birth_date']
        ]);

        if ($input['password'] && $input['password'] !== "") {
            $user->update(['password' => Hash::make($input['password'])]);
        }

        return redirect()->route('admin.dashboard')->withSuccess('The user ' . $user->username . ' was updated successfully.');
    }

    public function addToRole(Request $request, User $user)
    {
        // Check if the role exists
        $role = Role::findOrFail($request->all()['role']);
        $user->addRole($role->id);
        return redirect()->route('admin.dashboard')->withSuccess('The user ' . $user->username . ' was updated successfully.');
    }
}