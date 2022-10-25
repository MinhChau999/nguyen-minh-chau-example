<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }
    public function processLogin(Request $request)
    {
        $remember = $request->has('remember');
        $arr = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($arr, $remember)){
            $user = User::query()
                ->where('email',$request->get('email'))
                ->firstOrFail();
            Auth::login($user, $remember);
            return redirect()->intended('user');
        }
        return redirect()->back();
    }

    public function register()
    {
        return view('register');
    }

    public function processRegister(Request $request)
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
