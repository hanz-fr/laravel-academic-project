<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report.index',[
            'title' => 'iStudent | Reports',
            'active' => 'reports',
            'reports' => Report::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report.create', [
            'title' => 'iStudent | Create Report', 
            'active' => 'reports', 
            'reports' => Report::all(),
            'students' => Student::all(),
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
        $rules = [ 
            'student_id' => 'required',
            'subject_id' => 'required',
            'semester' => 'required',
            'tugas_1' => 'required|min:1|max:100', 
            'tugas_2' => 'required|min:1|max:100', 
            'tugas_3' => 'required|min:1|max:100', 
            'pts' => 'required|min:1|max:100', 
            'pas' => 'required|min:1|max:100', 
        ];

        $validatedData = $request->validate($rules);

        Report::create($validatedData);
        return redirect('/reports')->with('success', 'Report created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        $data = [
            $report->tugas_1,
            $report->tugas_2,
            $report->tugas_3,
            $report->pts,
            $report->pas,
        ];

        $average = collect($data)->avg();

        $summary = collect($data)->sum();


        /**
         * Menampilkan keterangan raport berdasarkan
         * total nilai yang diperoleh
         */
        if($summary > 400)
        {
            $keterangan = 'Pertahankan.';
        } elseif($summary >= 200) {
            $keterangan = 'Tingkatkan lagi.';
        } elseif($summary < 100) {
            $keterangan = 'Evaluasi diri.';
        }

        return view('report.show', [
            'title' => 'iStudent | Report Details', 
            'active' => 'reports', 
            'report' => $report,
            'nilaiAvg' => $average,
            'nilaiTotal' => $summary,
            'keterangan' => $keterangan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('report.edit', [
            'title' => 'iStudent | Edit Report',
            'active' => 'reports', 
            'report' => $report,
            'students' => Student::all(),
            'subjects' => Subject::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $rules = [
            'semester' => 'required|min:1|max:50', 
            'tugas_1' => 'required|min:1|max:100', 
            'tugas_2' => 'required|min:1|max:100', 
            'tugas_3' => 'required|min:1|max:100', 
            'pts' => 'required|min:1|max:100', 
            'pas' => 'required|min:1|max:100', 
        ];

        if($request->student_id != $report->student_id)
        {
            $rules['student_id'] =  'required';
        }

        if($request->subject_id != $report->subject_id)
        {
            $rules['subject_id'] =  'required';
        }

        $validatedData = $request->validate($rules);

        Report::where('id', $report->id)->update($validatedData);
        return redirect('/reports')->with('success', 'Report updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        Report::destroy($report->id);
        return redirect('/reports')->with('success', 'Report deleted successfully.');
    }
}
