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

    

    <div class="flex flex-col justify-start p-14 bg-white mb-auto mt-0 md:mt-10 w-full md:w-screen h-max md:h-auto rounded-none md:rounded-md shadow-md">
        <div class="flex flex-row justify-between">
            <h1 class="mb-0 md:mb-10 font-bold text-2xl sm:text-md md:text-2xl lg:text-3xl"> 
                Student Details
            </h1>
            <div class="flex flex-row mb-10 mt-2 md:mt-0 md:mb-0 gap-1">
                <a href="/students" class="font-bold text-white hover:shadow-sm hover:-translate-y-1 hover:bg-sky-400 transition ease-in text-xs bg-sky-300 rounded-md px-2 py-1 h-min md:px-3 md:py-2">Back</a>
                <a href="/students/{{ $student->id }}/edit" class="font-bold text-white hover:shadow-sm hover:-translate-y-1 hover:bg-orange-400 transition ease-in text-xs bg-orange-300 rounded-md px-2 py-1 h-min md:px-3 md:py-2">Edit</a>
                <form action="/students/{{ $student->id }}" method="POST" onclick="return confirm('Delete student?')">
                    @method('delete')
                    @csrf
                    <button href="#" class="font-bold text-white hover:shadow-sm hover:-translate-y-1 hover:bg-red-500 transition ease-in text-xs bg-red-400 rounded-md px-2 py-1 md:px-3 md:py-2">Delete</button>
                  </form>
            </div>
        </div>
        <table class="content-table my-5 overflow-y-auto">

            {{-- NIS SISWA --}}
            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>NIS</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->id }}</td>
            </tr>

            {{-- NAMA SISWA --}}
            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Nama</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->nama }}</td>
            </tr>

            {{-- KELAS SISWA --}}
            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Kelas</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->kelas->kelas }}</td>
            </tr>

            {{-- JURUSAN SISWA --}}
            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Jurusan</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->kelas->jurusan }}</td>
            </tr>

            {{-- ALAMAT SISWA --}}
            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Alamat</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->alamat }}</td>
            </tr>

            {{-- JENIS KELAMIN SISWA --}}
            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Jenis Kelamin</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->jenis_kelamin }}</td>
            </tr>

            {{-- AGAMA SISWA --}}
            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Agama</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->agama }}</td>
            </tr>

            {{-- TEMPAT LAHIR --}}
            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Tempat Lahir</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->tempat_lahir }}</td>
            </tr>

            {{-- TANGGAL LAHIR --}}
            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Tanggal Lahir</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->tanggal_lahir }}</td>
            </tr>

            {{-- TAHUN AJARAN --}}
            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Tahun Ajaran</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->tahun_ajaran }}</td>
            </tr>

            {{-- STATUS SISWA --}}
            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Status</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->status }}</td>
            </tr>

            {{-- JUMLAH RAPORT --}}
            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Jumlah Raport</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->reports->count() }}</td>
            </tr>

            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Created At</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->created_at->diffForHumans() }} ({{ $student->created_at }})</td>
            </tr>

            <tr>
                <td class="pr-3 pl-2 md:pl-5 border-b border-slate-200 py-1"><b>Updated At</b></td>
                <td class="pl-2 border-b border-slate-200 py-1">{{ $student->updated_at->diffForHumans() }} ({{ $student->updated_at }})</td>
            </tr>
        </table>
    </div>
</div>

@endsection