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
}
