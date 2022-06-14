<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user=new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make(($request->get('password')));

        $user->save();
        $request->session()->flash('message', 'You are now successfully Registered.');
        return redirect('/login');
    }
    public function login(Request $request)
    {
        $login_result = Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')]);
        if ($login_result) {
            $request->session()->flash('message', 'You are now successfully login.');
            return redirect('/dashboard');
        } else {
            $request->session()->flash('error_message', 'Invalid datas.');
            return redirect('/login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }
}
