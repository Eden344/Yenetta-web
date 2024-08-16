<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\information;  // Correctly import the model


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
        $schedules = Schedule::all();
        return view('students.create', compact('schedules'));
    }

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
            'schedule_id' => 'required|exists:schedules,id',
            'fee' => 'required'
        ]);
    
        $newproduct =information::create($data);
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
    $student = Information::findOrFail($id);
    $schedules = Schedule::all(); // Get all schedules

    return view('students.edit', compact('student', 'schedules'));
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
    
    public function scheduleIndex()
    {
        // Logic to fetch and display schedules related to students
        $students = information::with('schedule')->get();
        return view('students.schedule_index', compact('students'));
    }
    

    public function showStudentsBySchedule($scheduleId)
{
    // Retrieve the schedule with the related students
    $schedule = Schedule::with('students')->findOrFail($scheduleId);

    // Pass the schedule and its students to the view
    return view('schedules.schedule_students', ['schedule' => $schedule]);
}
     

    public function showAttendanceForm()
    {
        $students = Information::all();
        return view('students.mark_attendance', compact('students'));
    }

    public function markAttendance(Request $request)
    {   dd($request->all());
        $request->validate([
            'date' => 'required|date',
            'attendance' => 'required|array',
            'attendance.*' => 'required|boolean',
        ]);

        foreach ($request->attendance as $studentId => $present) {
            Attendance::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'date' => $request->date
                ],
                [
                    'present' => $present,
                    'schedule_id' => $request->schedule_id // Ensure this is passed in the request
                ]
            );
        }

        return redirect()->route('students.attendance_report')->with('success', 'Attendance marked successfully.');
    }

    public function attendanceReport()
    {
        $attendances = Attendance::with('student')->get();
        return view('students.attendance_report', compact('attendances'));
    }
    
}