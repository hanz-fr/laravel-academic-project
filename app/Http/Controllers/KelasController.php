<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Teacher;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('class.index',[
            'title' => 'iStudent | Classes',
            'active' => 'classes',
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('class.create',[
            'title' => 'iStudent | Create Class',
            'active' => 'classes',
            'classes' => Kelas::all(),
            'teachers' => Teacher::all(),
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
            'teacher_id' => 'required|unique:kelas',
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'status' => 'required'
        ]);

        Kelas::create($validatedData);
        return redirect('/classes')->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $class)
    {
        return view('class.show',[
            'title' => 'iStudent | Class Detail',
            'active' => 'classes',
            'class' => $class,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $class)
    {
        return view('class.edit',[
            'title' => 'iStudent | Edit Class',
            'active' => 'classes',
            'kelas' => $class,
            'teachers' => Teacher::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $class)
    {
        $rules = ([
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'status' => 'required'
        ]);

        if($request->teacher_id != $class->teacher_id){
            $rules['teacher_id'] = 'required|unique:kelas';
        }

        $validatedData = $request->validate($rules);

        Kelas::where('id', $class->id)->update($validatedData);
        return redirect('/classes')->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $class
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $class)
    {
        Kelas::destroy($class->id);
        return redirect('/classes')->with('success', 'Class deleted successfully.');
    }
}
