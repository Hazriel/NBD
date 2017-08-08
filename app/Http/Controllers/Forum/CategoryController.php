<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|min:3|max:100'
        ]);
    }

    private function RedirectIfValidationFails(array $data)
    {

    }

    public function create(Request $request)
    {
        $input = $request->all();

        Category::create([
            'title' => $input['title'],
            'required_view_power' => $input['required_view_power'],
            'required_modify_power' => $input['required_modify_power'],
            'required_delete_power' => $input['required_delete_power'],
        ]);
    }
}
