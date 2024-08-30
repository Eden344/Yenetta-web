<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Student;
use App\Models\Schedule;
use App\Models\Attendance;
use App\Models\information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller
{
    public function showCorrectPage(){
        if (Auth::check()){
            $student_count = information::count();
            $schedule_count = Schedule::count();
            $total_data = DB::table('information')->select('firstname', 'lastname', 'fee')->get()->toArray();
            $unpaid_students_count = 0;
            $paid_students_count = 0;
            $list_of_paid_students = [];
            $cash = 0;
            foreach ($total_data as $data){
                $data = (array)$data;
                if($data['fee'] == 0){
                    $unpaid_students_count += 1;
                } else {
                    array_push($list_of_paid_students, $data['firstname']. " " . $data['lastname']);
                    $paid_students_count++;
                }
                $cash+=$data['fee'];
            }
            return view('dashboard', [
                'student_count' => $student_count ,
                'schedule_count' => $schedule_count,
                'total_cash' => $cash,
                'not_paid' => $unpaid_students_count,
                'paid_students' => $list_of_paid_students
            ]);
        }
        return view('login');
    }
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

        if(Auth::attempt([
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
        Auth::logout();
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
