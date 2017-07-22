<?php

namespace App\Http\Controllers;

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

    public function createRoleForm()
    {
        $pageTitle = "Create Role";
        return view('admin.role.create');
    }

    public function updateRoleForm($role)
    {
        $pageTitle = "Update Role";
        $role = Role::find($role);
        return view('admin.role.update', compact('role'));
    }
}
