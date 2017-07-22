<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    public function create(Request $request)
    {
    }
}
