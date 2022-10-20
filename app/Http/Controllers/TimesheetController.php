<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Timesheet;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        //  //convert date to 12 hours
        // $date = Carbon::now()->format('Y-m-d H:i:s A');
        // return $date;

        $user_id = auth()->user()->id;


        if (auth()->user()->group == 1) {
            // $timesheets = Timesheet::join('students', 'timesheets.student_id',  'students.id')
            //     ->join('users', 'timesheets.user_id', 'users.id')
            //     ->select(
            //         'day_name as day_name',
            //         'time_day as time_day',
            //         'students.name as student_name',
            //         'students.last_name as student_last_name',
            //         'users.name as user_name',
            //         'users.last_name as user_last_name',
            //         'timesheets.created_at as created_at',
            //         'timesheets.updated_at as updated_at'
            //     )

            //     ->get();
            return redirect('/home');
        } else {
            $timesheets = Timesheet::where('timesheets.user_id', '=',  $user_id)
                ->join('students', 'timesheets.student_id',  'students.id')
                ->where('timesheets.is_active', true)
                ->where('students.active', '=', 1)

                ->select(
                    'day_name as day_name',
                    'time_day as time_day',
                    'students.name as student_name',
                    'students.last_name as student_last_name',
                    'timesheets.created_at as created_at',
                    'timesheets.updated_at as updated_at',
                    'timesheets.id as timesheet_id'

                )
                ->orderBy('time_day')

                ->get();
        }

        // return $timesheets;

        // filters by day_name






        $time_shift = config('time_shift');

        $user = auth()->user();



        return view('admin.timesheets.index', compact('timesheets', 'time_shift', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        if (auth()->user()->group == 1) {
            $student = Student::where('active', 1)->get();
        } else {
            $student = Student::where('user_id', auth()->user()->id)
                ->where('active', 1)->get();
        }
        //daty of week
        $days = [
            '1' => 'الاثنين',
            '2' => 'الثلاثاء',
            '3' => 'الأربعاء',
            '4' => 'الخميس',
            '5' => 'الجمعة',
            '6' => 'السبت',
            // '7' => 'الأحد',

        ];

        $time_shift = config('time_shift');

        return view('admin.timesheets.create', compact('student', 'days', 'time_shift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $input = $request->all();
        $student = Student::where('id', $input['student_id'])->first();

        $taken_time = Timesheet::where('user_id', $student->user_id)
            ->where('time_day', $input['time_day'])
            ->where('day_name', $input['day_name'])
            ->first();

        if ($taken_time) {
            return   redirect('/time/create')->with('error', 'هذا الوقت موجود مسبقا');
        }

        $time = new Timesheet();
        $time->day_name = $input['day_name'];
        $time->time_day = $input['time_day'];


        $time->student_id = $student->id;
        $user_id = $student->user_id;
        // return $user_id;

        //conveert to integer

        $time['user_id'] = $user_id;




        // return $time;
        // Timesheet::create($time);
        if ($user_id != null) {



            $time->save();
        }

        return  redirect('/time/create')->with('success', 'Timesheet created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Http\Response
     */
    public function show(Timesheet $timesheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $timesheet = Timesheet::findOrFail($id);
        if ($timesheet->user_id != auth()->user()->id) {
            return redirect()->to(route('time.index'))->with('error', 'You are not allowed to edit this timesheet.');
        }

        return view('admin.timesheets.edit', compact('timesheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timesheet $timesheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timesheet $timesheet)
    {
        //
    }


    public function TimeById($id)
    {

        if (auth()->user()->group == 1) {
            $user = User::find($id);
            if (!$user || $user->group == 1) {
                return redirect()->back();
            }
            $timesheets = Timesheet::where('timesheets.user_id', '=',  $id)
                ->join('students', 'timesheets.student_id',  'students.id')
                ->where('timesheets.is_active', true)
                ->where('students.active', '=', 1)
                ->select(

                    'day_name as day_name',
                    'time_day as time_day',
                    'students.name as student_name',
                    'students.last_name as student_last_name',
                    'timesheets.created_at as created_at',
                    'timesheets.updated_at as updated_at',
                    'timesheets.id as timesheet_id'
                )
                ->orderBy('time_day')

                ->get();
            $time_shift = config('time_shift');



            return view('admin.timesheets.index', compact('timesheets', 'time_shift', 'user'));
        }

        return redirect('/home');
    }
}
