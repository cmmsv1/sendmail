<?php

namespace App\Http\Controllers;

use App\Mail\Score as MailScore;
use App\Mail\SendMail;
use App\Models\Score;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class RegisterServiceController extends Controller
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

    public function notification()
    {
        return view('result.success')
            ->with('', '');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $MSV = strtoupper($request->MSV);
        $student = Student::where('MSV', $MSV)->first();
        if ($student) {
            $student->mail_register = $request->email;
            $student->mailStatus = true;
            $student->update();
            $scores = Score::where('student_id', $student->id)->get();
            if (count($scores) < 1) {
                $message = 'Hiện tại điểm của bạn chưa được cập nhật. Chúng tôi sẽ gửi điểm của bạn về email đã đăng ký ngay sau khi điểm của bạn được cập nhật. Vui lòng theo dõi điểm của bạn qua email ! ';
            } else {
                $message = 'Bạn đã có điểm ' . count($scores) . ' môn. Chúng tôi sẽ gửi điểm cập nhật liên tục qua email bạn đã đăng ký. Vui lòng check email !';
                $mail = new SendMail($scores);
                Mail::to($request->email)->send($mail);
            }
            return view('result.success')
                ->with(compact('message'));
        } else {
            return redirect()->back()
                ->with(
                    'message',
                    'Mã sinh viên của bạn không tồn tại ! '
                );
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
        //
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
