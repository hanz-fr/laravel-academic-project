<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Kelas;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index',[
            'title' => 'iStudent | Students',
            'active' => 'students',
            'students' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create',[
            'title' => 'iStudent | Create New Students',
            'active' => 'students',
            'students' => Student::all(),
            'kelas' => Kelas::all(),
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
            'id' => 'required|max:10|min:10|unique:students',
            'kelas_id' => 'required|string',
            'nama' => 'required|max:255|min:5|string',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|min:5|string',
            'tahun_ajaran' => 'required',
            'status' => 'required'
        ]);

        Student::create($validatedData);
        return redirect('/students')->with('success', 'Student created succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', [
            'title' => 'iStudent | Student Details',
            'active' => 'students',
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            'title' => 'iStudent | Edit Student',
            'active' => 'students',
            'student' => $student,
            'kelas' => Kelas::all(),
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $rules = [
            'kelas_id' => 'required',
            'nama' => 'required|max:255|min:5',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|min:5',
            'tahun_ajaran' => 'required',
            'status' => 'required'
        ];

        if($request->id != $student->id){
            $rules['id'] = 'required|max:10|min:10|unique:students';
        }

        $validatedData = $request->validate($rules);

        Student::where('id', $student->id)->update($validatedData);
        return redirect('/students')->with('success', 'Student updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('success', 'Student deleted succesfully.');
    }
}
