<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:30|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'string|min:6|confirmed',
            'birth_date' => 'nullable|date_format:d-m-Y'
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

    public function updateForm(User $user)
    {
        foreach ($user->roles as $role)
        {
            $userRoles[$role->id] = $role->name;
        }
        foreach (Role::all() as $role)
        {
            $roles[$role->id] = $role->name;
        }
        return view('admin.user.update', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, User $user)
    {
        $input = $request->all();
        $this->redirectIfValidationFail($input);

        // Upload the avatar if there is one
        if ($request->file('avatar')) {
            $path = Storage::disk('public')->putFile('avatars', $request->file('avatar'));
            $user->update(['avatar' => $path]);
        }

        $user->update([
            'email'      => $input['email'],
            'birth_date' => Carbon::createFromFormat('d-m-Y', $input['birth_date'])->toDateTimeString(),
            'description' => $input['description'],
        ]);

        if ($input['password'] && $input['password'] !== "") {
            $user->update(['password' => Hash::make($input['password'])]);
        }

        return redirect()->back()->withSuccess('The user ' . $user->username . ' was updated successfully.');
    }

    public function addToRole(Request $request, User $user)
    {
        // Check if the role exists
        $role = Role::findOrFail($request->all()['role']);
        if ($user->hasRole($role->slug))
            return redirect()->route('admin.dashboard')->withErrors('The user ' . $user->username . ' already has the role ' . $role->name . '.');
        $user->addRole($role->id);
        return redirect()->route('admin.dashboard')->withSuccess('The user ' . $user->username . ' was updated successfully.');
    }

    public function removeFromRole(Request $request, User $user)
    {
        $role = Role::findOrFail($request->all()['role']);
        if (!$user->hasRole($role->slug))
            return redirect()->route('admin.dashboard')->withErrors('The user ' . $user->username . ' doesn\'t have the role ' . $role->name . '.');
        $user->removeRole($role->id);
        return redirect()->route('admin.dashboard')->withSuccess('The user ' . $user->username . ' was removed from the role ' . $role->name . '.');
    }

    public function searchUser(Request $request)
    {
        $name = $request->all()['username'];
        $users = User::where('username', 'LIKE', '%' . $name . '%')->get();
        return view('admin.user.list', compact('users'));
    }
}