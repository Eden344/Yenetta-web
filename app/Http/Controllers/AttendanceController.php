<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Attendance;
use App\Models\Information;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Show the form for marking attendance
    public function showAttendanceForm()
    {
        $students = Information::all(['id', 'firstname', 'middlename', 'lastname']); // Fetch necessary fields
        $schedules = Schedule::all(['name', 'time_in', 'time_out']); // Fetch necessary fields
        return view('attendance.mark_form', compact('students', 'schedules'));
    }


    // Store attendance data
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
            $attendance->present = true;
            $attendance->time_in = $attendance->time_in ?? now();
            $attendance->time_out = now();
        } else {
            $attendance->present = false;
            $attendance->time_in = null;
            $attendance->time_out = null;
        }
        $attendance->schedule_id = 1;

        // Save the attendance record
        $attendance->save();
    }

    return redirect('/attendance/report')->with('success', 'Attendance marked successfully.');
}


public function showAttendanceReport()
{
    $students = Information::all(); // Fetch all students
    $dates = Attendance::select('date')->distinct()->orderBy('date', 'asc')->get()->pluck('date'); // Get unique attendance dates
    
    // Initialize an array to store attendance status per student per date
    $attendanceStatus = [];

    foreach ($students as $student) {
        foreach ($dates as $date) {
            // Get attendance for the student on a specific date
            $attendance = Attendance::where('student_id', $student->id)
                                    ->where('date', $date)
                                    ->first();
            // Store the attendance status ('Present' or 'Absent')
            $attendanceStatus[$student->id][$date] = $attendance ? ($attendance->present ? '✔️' : '❌') : 'Not Marked';
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

    return redirect('/attendance/report')->with('success', 'Attendance submitted successfully.');
}

public function filtered_attendance(Request $request){
    $schedule_id = $request->input('schedule_id');
    $students = Information::where('schedule_id','=', $schedule_id)->get();
    $schedules = Schedule::all();
    $current_schedule = Schedule::where('id','=',$schedule_id)->first();
    return view('attendance.mark', compact('students', 'schedules','schedule_id','current_schedule'));
}

public function markAttendanceForm() {
    $students = Information::all();
    $default_schedule_id = Schedule::count();
    $schedules = Schedule::all(['id','name', 'time_in', 'time_out']); // Fetch necessary fields
    return view('attendance.mark', compact('students', 'schedules', 'default_schedule_id'));
    $default_schedule_id = Schedule::count();
    $schedules = Schedule::all(['id','name', 'time_in', 'time_out']); // Fetch necessary fields
    return view('attendance.mark', compact('students', 'schedules', 'default_schedule_id'));
}

}
