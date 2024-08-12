<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function displayLoginForm() {
        return view('login');
    }
    public function displayRegisterForm() {
        return view('register');
    }
    public function login(Request $request) {
        
        $incoming_fields = $request->validate([
            'username' => 'required',
            'password' => 'required'
            ]);

        if(auth()->attempt([
           'name' => $incoming_fields['username'],
           'password' => $incoming_fields['password']
        ])){
           $request->session()->regenerate();
           return redirect('/');
        } else {
            return redirect('/login')->with('error_message', "Invalid Login or Password.");
        }

    }
    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request) {
        $incoming_fields = $request->validate([
            'username' => 'required',
            'email' =>['required', 'email'],
            'password' => ['required']
        ]);
        $incoming_fields['name'] = $incoming_fields['username'];
        User::create($incoming_fields);
        return redirect('/login')->with('register_success', "Successfully registered.");

    }


}
