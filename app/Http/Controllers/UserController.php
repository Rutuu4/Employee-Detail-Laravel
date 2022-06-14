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
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
            'password_confirmation'=> 'required_with:password|same:password|min:6|max:12'
        ]);
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
        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
            
        ]);
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
