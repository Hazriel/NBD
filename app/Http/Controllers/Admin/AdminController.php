<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pageTitle = "Dashboard";
        $roles = Role::all();
        return view('admin.dashboard', compact('pageTitle', 'roles'));
    }


    // TODO: Change the place of this function, should be in PermissionController
    private function createPermission($slug, $description)
    {
        Permission::create([
            'slug' => $slug,
            'description' => $description
        ]);
    }

    public function generatePermissionSet()
    {
        $this->createPermission('user.create', 'Is able to create users.');
        $this->createPermission('user.update', 'Is able to update users.');
        $this->createPermission('user.ban', 'Is able to update users.');
        $this->createPermission('user.delete', 'Is able to delete users.');

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
