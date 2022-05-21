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

    <div class="flex flex-col justify-start p-14 bg-white mb-auto mt-0 md:mt-10 w-full md:w-screen h-screen md:h-auto rounded-none md:rounded-md shadow-md">
        <div class="flex flex-row justify-between">
            <h1 class="mb-0 md:mb-10 font-bold text-2xl sm:text-md md:text-2xl lg:text-3xl"> 
                Subject Details
            </h1>
            <div class="flex flex-row mb-10 mt-2 md:mt-0 md:mb-0 gap-1">
                <a href="/subjects" class="font-bold text-white hover:shadow-sm hover:-translate-y-1 hover:bg-sky-400 transition ease-in text-xs bg-sky-300 rounded-md px-2 py-1 h-min md:px-3 md:py-2">Back</a>
                <a href="/subjects/{{ $subject->id }}/edit" class="font-bold text-white hover:shadow-sm hover:-translate-y-1 hover:bg-orange-400 transition ease-in text-xs bg-orange-300 rounded-md px-2 py-1 h-min md:px-3 md:py-2">Edit</a>
                <form action="/subjects/{{ $subject->id }}" method="POST" onclick="return confirm('Delete teacher?')">
                    @method('delete')
                    @csrf
                    <button href="#" class="font-bold text-white hover:shadow-sm hover:-translate-y-1 hover:bg-red-500 transition ease-in text-xs bg-red-400 rounded-md px-2 py-1 md:px-3 md:py-2">Delete</button>
                </form>
            </div>
            </div>
        <table class="content-table my-5 overflow-y-auto">

            {{-- ID PELAJARAN--}}
            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Id</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $subject->id }}</td>
            </tr>

            {{-- NAMA PELAJARAN--}}
            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Nama Pelajaran</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $subject->nama }}</td>
            </tr>

            {{-- KETERANGAN PELAJARAN --}}
            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Keterangan</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $subject->keterangan }}</td>
            </tr>

            {{-- GURU PENGAJAR --}}
            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Guru Pengajar</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $subject->teachers->implode('nama', ', ') }}</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Created At</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $subject->created_at->diffForHumans() }} ({{ $subject->created_at }})</td>
            </tr>

            <tr>
                <td class="pr-2 border-b border-slate-200 py-1"><b>Updated At</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $subject->updated_at->diffForHumans() }} ({{ $subject->updated_at }})</td>
            </tr>

        </table>
    </div>
</div>

@endsection