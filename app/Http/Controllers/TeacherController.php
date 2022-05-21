<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.index', [
            'title' => 'iStudent | Teachers',
            'active' => 'teachers',
            'teachers' => Teacher::all(), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create',[
            'title' => 'iStudent | Create New Teachers',
            'active' => 'teachers',
            'teachers' => Teacher::all(),
            'subjects' => Subject::all(),
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
            'id' => 'required|max:18|min:18|unique:teachers',
            'nama' => 'required|max:255|min:5',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|min:5|max:255',
            'nomor_hp' => 'required|min:12|max:15',
        ]);
        
        $data = Teacher::create($validatedData);

        // Input data id mapel dan menghubungkannya 
        // dengan model guru yang baru saja dibuat.
        $data->subjects()->attach($request->subject_id);

        return redirect('/teachers')->with('success', 'Teacher created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teacher.show', [
            'title' => 'iStudent | Teacher Details',
            'active' => 'teachers',
            'teacher' => $teacher,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', [
            'title' => 'iStudent | Edit Teacher',
            'active' => 'teachers',
            'teacher' => $teacher,
            'teacher_subject' => $teacher->subjects,
            'subjects' => Subject::all()->whereNotIn('id', $teacher->subjects->pluck('id')),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $rules = [
            'nama' => 'required|max:255|min:5',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|min:5|max:255',
            'nomor_hp' => 'required|min:12|max:15',
        ];

        if($request->id != $teacher->id){
            $rules['id'] = 'required|max:10|min:10|unique:teachers';
        }

        $validatedData = $request->validate($rules);

        $teacher->subjects()->detach($teacher->subjects->pluck('id'));
        $teacher->subjects()->attach($request->subject_id);

        Teacher::where('id', $teacher->id)->update($validatedData);
        return redirect('/teachers')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        Teacher::destroy($teacher->id);
        return redirect('/teachers')->with('success', 'Teacher deleted successfully.');
    }
}
