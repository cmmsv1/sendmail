<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index')
            ->with(compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create')
            ->with('', '');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'MMH' => 'required|unique:subjects',
        ]);
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->MMH = strtoupper($request->MMH);
        if ($subject->save()) {
            return redirect()->route('subject.index')
                ->with(
                    'message',
                    'Thêm môn học thành công '
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
        $subject = Subject::findOrFail($id);
        return view('subject.edit')
            ->with(compact('subject'));
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
        $request->validate([
            'MMH' => ['required', Rule::unique('subjects')->ignore($id)],
        ]);
        $subject = Subject::findOrFail($id);
        $subject->name = $request->name;
        $subject->MMH = strtoupper($request->MMH);
        if ($subject->update()) {
            return redirect()->route('subject.index')
                ->with(
                    'message',
                    'Cập nhật môn học thành công '
                );
        }
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
