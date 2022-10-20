<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use App\Models\Student;
use Illuminate\Http\Request;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $student = Student::find($id);
        if (!$student) {
            return redirect('/home');
        }
        //get sora from config file
        $swar = config('swar');
        return view('admin.revisions.create', compact('student', 'swar'));
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
        // return $request->all();


        //check if from is negative number
        $from = $request->input('from');
        $to = $request->input('to');
        if ($from < 1 || $to < 1 || $from > $to) {
            return redirect()->back()->with('error', 'الرجاء التأكد من رقم الايات');
        }
        $data = $request->capture([
            'student_id' => 'required|integer',
            'from' => 'required|numeric|min:1',
            //check if to is greater than from and if it is not equal to from
            'to' => 'required|numeric|greater than from',

            'revision_type' => 'required|string',
            'notes' => 'string',
            'soura' => 'required|numeric',
            'created_at' => 'date'
        ]);



        //change forma





        // return $data;
        $revision = new Revision();
        $revision->student_id = $data['student_id'];
        $revision->from = $data['from'];
        $revision->to = $data['to'];
        $revision->type = $data['revision_type'];
        $revision->soura = $data['soura'];
        $revision->description = $data['notes'] ?? null;
        $revision->user_id = auth()->user()->id;
        $revision->created_at = $data['created_at'];
        $revision->save();

        //redirect to route('students.show', $student->id)
        return redirect()->route('students.sheet', $data['student_id'])->with('success', 'تم إضافة التعديل بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function show(Revision $revision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function edit(Revision $revision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revision $revision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revision $revision)
    {
        //
    }
    public function sheet($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect('/home');
        }

        $revisions = Revision::where('student_id', $id)->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return view('admin.students.sheet', compact('student', 'revisions'));
    }
}
