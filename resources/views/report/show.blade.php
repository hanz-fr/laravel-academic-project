@extends('layouts.main')


<style>
    /* .content-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
    }

    .content-table thead tr {
        background-color: rgb(77, 224, 205);
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }

    .content-table tbody tr{
        border-bottom: 1px solid #dddddd;
    } */

    .content-table tbody tr:nth-of-type(even) {

    }

    /* .content-table tbody tr:last-of-type {
        background-color: #f3f3f3;
        border-bottom: 2px solid rgb(51, 150, 137)
    } */
</style>

@section('content')

<div class="flex justify-start overflow-y-auto mx-0 md:mx-10 h-fit">

    <div class="flex flex-col justify-start p-14 bg-white mt-0 md:mt-10 w-full md:w-screen h-max md:h-auto rounded-none md:rounded-md shadow-md">
        <div class="flex flex-row justify-between">
            <h1 class="mb-0 md:mb-10 font-bold text-2xl sm:text-md md:text-2xl lg:text-3xl"> 
                Report Details
            </h1>
            <div class="flex flex-row mb-10 mt-2 md:mt-0 md:mb-0 gap-1">
                <a href="/reports" class="font-bold text-white hover:shadow-sm hover:-translate-y-1 hover:bg-sky-400 transition ease-in text-xs bg-sky-300 rounded-md px-2 py-1 h-min md:px-3 md:py-2">Back</a>
                <a href="/reports/{{ $report->id }}/edit" class="font-bold text-white hover:shadow-sm hover:-translate-y-1 hover:bg-orange-400 transition ease-in text-xs bg-orange-300 rounded-md px-2 py-1 h-min md:px-3 md:py-2">Edit</a>
                <form action="/reports/{{ $report->id }}" method="POST" onclick="return confirm('Delete report?')">
                    @method('delete')
                    @csrf
                    <button href="#" class="font-bold text-white hover:shadow-sm hover:-translate-y-1 hover:bg-red-500 transition ease-in text-xs bg-red-400 rounded-md px-2 py-1 md:px-3 md:py-2">Delete</button>
                </form>
            </div>
            </div>
        <table class="content-table my-5 overflow-y-auto">

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Id</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->id }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Student ID</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->student_id }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Student Name</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->student->nama }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Subject ID</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->subject_id }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Subject Name</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->subject->nama }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Semester</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->semester }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Tugas 1</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->tugas_1 }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Tugas 2</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->tugas_2 }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Tugas 3</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->tugas_3 }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>PTS</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->pts }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>PAS</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->pas }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Rata-rata</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $nilaiAvg }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Total Nilai</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $nilaiTotal }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Keterangan</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $keterangan }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Created At</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->created_at->diffForHumans() }} ({{ $report->created_at }})</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Updated At</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $report->updated_at->diffForHumans() }} ({{ $report->updated_at }})</td>
            </tr>

        </table>
    </div>
</div>

@endsection