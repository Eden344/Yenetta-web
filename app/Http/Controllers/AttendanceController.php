<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Information;

class AttendanceController extends Controller
{
    // Show the form for marking attendance
    public function showAttendanceForm()
    {
        $students = Information::all(['id', 'firstname', 'middlename', 'lastname']); // Fetch necessary fields
        return view('attendance.mark', compact('students'));
    }
    


    // Store attendance datapublic function markAttendance(Request $request)
    public function markAttendance(Request $request)
{
    $attendanceData = $request->input('attendance', []);

    foreach ($attendanceData as $studentId => $data) {
        $date = $data['date'];
        $present = isset($data['present']) ? true : false;

        // Find existing attendance record or create a new one
        $attendance = Attendance::firstOrNew([
            'student_id' => $studentId,
            'date' => $date,
        ]);

        // Set the attendance status
        if ($present) {
            $attendance->time_in = now();
            $attendance->time_out = now();
        } else {
            $attendance->time_in = null;
            $attendance->time_out = null;
        }

        // Save the attendance record
        $attendance->save();
    }

    return redirect()->back()->with('success', 'Attendance marked successfully.');
}

    

    // Generate attendance report
    public function attendanceReport()
    {
        // Fetch all students along with their attendance records
        $students = Information::with('attendances')->get();
        $dates = Attendance::select('date')->distinct()->orderBy('date')->pluck('date');
    
        // Prepare an array to hold the attendance status for each student on each date
        $attendanceStatus = [];
    
        foreach ($students as $student) {
            foreach ($dates as $date) {
                $attendance = $student->attendances->firstWhere('date', $date);
    
                // Check if the attendance record exists and whether the student was present
                if ($attendance && $attendance->time_in && $attendance->time_out) {
                    $attendanceStatus[$student->id][$date] = '✔️';
                } else {
                    $attendanceStatus[$student->id][$date] = '❌';
                }
            }
        }
    
        return view('attendance.report', compact('students', 'dates', 'attendanceStatus'));
    }
    
      

    public function submitAttendance(Request $request)
{
    $attendanceData = $request->input('attendance', []);

    foreach ($attendanceData as $studentId => $dates) {
        foreach ($dates as $date => $present) {
            // Find existing attendance record or create a new one
            $attendance = Attendance::firstOrNew([
                'student_id' => $studentId,
                'date' => $date,
            ]);

            // Set the attendance status
            $attendance->time_in = $present ? now() : null;
            $attendance->time_out = $present ? now() : null;

            // Save the attendance record
            $attendance->save();
        }
    }

    return redirect()->back()->with('success', 'Attendance submitted successfully.');
}
    

public function markAttendanceForm()
{
    $students = Information::all();
    return view('attendance.mark', compact('students'));
}
    
}
