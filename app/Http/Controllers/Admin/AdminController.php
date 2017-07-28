<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pageTitle = "Dashboard";
        $roles = Role::all();
        $users = User::all()->sortByDesc('created_at')->take(10);
        $pageCount = User::all()->count() / 10 + 1;
        return view('admin.dashboard', compact('pageTitle', 'roles', 'users', 'pageCount'));
    }


    // TODO: Change the place of this function, should be in PermissionController
    private function createPermission($slug, $description)
    {
        Permission::create([
            'slug' => $slug,
            'description' => $description
        ]);
    }

    private function createRole($name, $slug, $description)
    {
        Role::create([
            'name' => $name,
            'slug' => $slug,
            'descritpion' => $description
        ]);
    }

    public function generateRoleSet()
    {
        $this->createRole('Admin', 'admin', 'Admin group.');
        $this->createRole('Moderator', 'mod', 'Moderator group.');
        $this->createRole('Member', 'member', 'Member group.');
    }

    public function generatePermissionSet()
    {
        $this->createPermission('user.create', 'Is able to create users.');
        $this->createPermission('user.update', 'Is able to update users.');
        $this->createPermission('user.delete', 'Is able to delete users.');
        $this->createPermission('user.ban', 'Is able to update users.');

        $this->createPermission('role.create', 'Is able to create roles.');
        $this->createPermission('role.update', 'Is able to update roles.');
        $this->createPermission('role.delete', 'Is able to delete roles.');

        $this->createPermission('news.create', 'Is able to create news.');
        $this->createPermission('news.update', 'Is able to update news.');
        $this->createPermission('news.delete', 'Is able to delete news.');

        $this->createPermission('admin.access', 'Is able to access the admin interface');

        return redirect()->route('admin.dashboard')->with('success', 'A basic permission set was successfully created.');
    }
}
