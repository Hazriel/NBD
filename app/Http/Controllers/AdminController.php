<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pageTitle = "Dashboard";
        return view('admin.dashboard', compact('pageTitle'));
    }

    public function createRoleForm()
    {
        $pageTitle = "Create Role";
        return view('admin.role.create');
    }
}
