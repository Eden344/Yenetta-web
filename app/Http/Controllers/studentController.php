<?php

namespace App\Http\Controllers;
use App\Models\information;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class studentController extends Controller
{
    public function index() {
        return view('data');
    }

    public function show() {
        return view('data');
    }

    public function studentValidation(Request $request) {
        $incoming_fields = $request->validate([
            'firstname' => ['required', 'string', 'min:2', 'alpha'],
            'middlename' => ['required', 'string', 'min:2', 'alpha'],
            'lastname' => ['required', 'string', 'min:2', 'alpha'],
            'email' => [Rule::unique('information', 'email'), 'email', 'required'],
            'age' => 'max:130',
            'phonenumber1' => ['required', 'regex:/^09[0-9]{8}$/'],
            'phonenumber2' => ['required', 'regex:/^09[0-9]{8}$/'],
            'gender' => 'required',
            'school' => 'required',
            'address' => 'required'
        ]);
        information::create($incoming_fields);
        return redirect('/')->with('register_success', 'You have successfully registered a new student.');
    }
}
