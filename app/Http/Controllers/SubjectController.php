<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subject.index',[
            'title' => 'iStudent | Subjects',
            'active' => 'subjects',
            'subjects' => Subject::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create',[
            'title' => 'iStudent | Create Subject',
            'active' => 'subjects',
            'subjects' => Subject::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3',
            'keterangan' => 'required|min:3'
        ]);

        Subject::create($validatedData);
        return redirect('/subjects')->with('success', 'Subject created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('subject.show',[
            'title' => 'iStudent | Subject Details',
            'active' => 'subjects',
            'subject' => $subject
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('subject.edit',[
            'title' => 'iStudent | Edit Subject',
            'active' => 'subjects',
            'subject' => $subject
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $rules = [
            'nama' => 'required|min:3',
            'keterangan' => 'required|min:3'
        ];

        $validatedData = $request->validate($rules);

        Subject::where('id', $subject->id)->update($validatedData);
        return redirect('/subjects')->with('success', 'Subject updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        Subject::destroy($subject->id);
        return redirect('/subjects')->with('success', 'Subject deleted successfully.');
    }
}
