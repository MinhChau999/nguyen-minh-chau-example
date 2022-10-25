<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $data = User::query()->paginate(5);
        return view('user',[
            'data' => $data,
        ]);
    }

    public function createUser()
    {
        return view('createUser');
    }

    public function store(Request $request)
    {
        $arr = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $user = User::create($arr);
        return redirect()->intended('user');
    }
}
