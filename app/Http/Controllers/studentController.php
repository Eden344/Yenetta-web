<?php

namespace App\Http\Controllers;

use App\Models\information;  // Correctly import the model
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class studentController extends Controller
{
    public function index()
    {
        $students = information::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

<<<<<<< HEAD
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
       $data= $request->validate([
            'firstname' => 'required',
            'middlename' => 'nullable',
            'lastname' => 'required',
            'email' => 'required|email|unique:information',
            'phonenumber' => 'required',
            'gender' => 'required',
            'age' => 'required|integer',
            'school' => 'required',
            'address' => 'required',
        ]);
    
        $newproduct =information::create($request->all());
        return redirect()->route('students.index')
                         ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(information $student)
    {
        return view('students.show', compact('student'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = information::findOrFail($id); // Fetch student by ID
        return view('students.edit', compact('student'));
    }
    
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = information::findOrFail($id);
    
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            // other validation rules
        ]);
    
        $student->update($request->all());
    
        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(information $student)
    {
        $student->delete();
        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully.');
    }
    
=======
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
>>>>>>> c09d9b36e4814b3e39ad1a99d369039efef0e920
}
