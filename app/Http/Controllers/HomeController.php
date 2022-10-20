<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
//use Student
use App\Models\User;
use App\Models\Timesheet;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (auth()->user()->group != 1)
            $users = Student::where('user_id', auth()->user()->id)
                ->where('active', 1)
                ->count();
        else {
            $users = Student::where('active', 1)
                ->count();
        }

        $today = time();

        $today = date('D', $today);

        $day_of_week = [
            'Mon' => 1,
            'Tue' => 2,
            'Wed' => 3,
            'Thu' => 4,
            'Fri' => 5,
            'Sat' => 6,
            'Sun' => 7,
        ];




        $today_user = Timesheet::join('students', 'timesheets.student_id',  'students.id')
            ->where('timesheets.user_id', auth()->user()->id)
            ->where('timesheets.day_name', $day_of_week[$today])
            ->count();

        // return $today_user;
        return view('home', compact('users', 'today_user'));
    }
}
