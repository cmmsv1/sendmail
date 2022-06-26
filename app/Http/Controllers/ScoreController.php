<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Mail\SendMail;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('score.index')
            ->with(compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('score.create')
            ->with(compact('subjects'));
    }
    public function addScore($id)
    {
        $subjects = Subject::all();
        $student = Student::find($id);
        $scores = Score::where('student_id', $id)->get();
        return view('score.create')
            ->with(compact('subjects', 'scores', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $score_check = Score::where('subject_id', $request->subject)->where('student_id', $request->student_id)->first();
        if ($score_check) {
            return redirect()->back()
                ->with(
                    'message',
                    'Bạn đã thêm điểm môn này rồi'
                );
        } else {
            $score = new Score();
            $score->student_id = $request->student_id;
            $score->subject_id = $request->subject;
            $score->score = $request->score;
            if ($score->save()) {
                $student = Student::find($request->student_id);
                if ($student->mailStatus) {
                    $scores = Score::where('student_id', $request->student_id)->get();
                    $mail = new SendMail($scores);
                    Mail::to($student->mail_register)->queue($mail);
                    return redirect()->back()
                        ->with(
                            'message',
                            'Thêm điểm thành công '
                        );
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scores = Score::where('student_id', $id)->get();
        return view('score.modal')
            ->with(compact('scores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
