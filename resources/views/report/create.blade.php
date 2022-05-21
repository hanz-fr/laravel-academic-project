@extends('layouts.main')

@section('content')

<div class="bg-white justify-center p-10 overflow-y-auto w-full h-screen">
    <div class="mb-7">
        <a href="/reports" class="text-xs sm:text-xs md:text-sm lg:text-md xl:text-md text-sky-400"><i class="fa fa-chevron-left leading-none text-sky-400"></i> Back</a>
        <h1 class="font-bold text-black mt-12 text-xl sm:text-lg md:text-lg lg:text-xl xl:text-2xl xl:mx-20 lg:mx-16 md:mx-0 sm:mx-0">Create New Reports</h1>
    </div>

    <form action="/reports" method="POST" class="flex flex-col sm:w-full md:w-full lg:w-1/2 xl:w-1/2 xl:mx-20 lg:mx-16 md:mx-0 sm:mx-0">
        
        @csrf
        {{-- SISWA --}}
        <label for="student_id" class="text-md font-semibold">Siswa</label>
        @error('student_id')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <select name="student_id" id="student_id" class="border-2 rounded-md border-slate-200 p-2 mb-5">
            @foreach ($students as $student)
                @if(old('student_id') == $student->id)
                    <option value="{{ $student->id }}" selected>{{ $student->nama }} ({{ $student->kelas->kelas }}-{{ $student->kelas->jurusan }}) </option>
                @else
                    <option value="{{ $student->id }}">{{ $student->nama }} ({{ $student->kelas->kelas }}-{{ $student->kelas->jurusan }}) </option>
                @endif
            @endforeach
        </select>
        

        {{-- MATA PELAJARAN --}}
        <label for="subject_id" class="text-md font-semibold">Pelajaran</label>
        @error('subject_id')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <select name="subject_id" id="subject_id" class="border-2 rounded-md border-slate-200 p-2 mb-5">
            @foreach ($subjects as $subject)
                @if(old('subject_id') == $subject->id)
                    <option value="{{ $subject->id }}" selected>{{ $subject->nama }} ({{ $subject->keterangan }})</option>
                @else
                    <option value="{{ $subject->id }}">{{ $subject->nama }} ({{ $subject->keterangan }})</option>
                @endif
            @endforeach
        </select>


        {{-- SEMESTER --}}
        <label for="semester" class="text-md font-semibold">Semester</label>
        @error('semester')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="number" max="50" min="1" name="semester" id="semester" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('semester') invalid:border-red-500 @enderror  font-semibold" required value={{ old('semester') }}>

        {{-- TUGAS 1 --}}
        <label for="tugas_1" class="text-md font-semibold">Tugas 1</label>
        @error('tugas_1')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="number" max="100" min="1" name="tugas_1" id="tugas_1" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('tugas_1') invalid:border-red-500 @enderror  font-semibold" required value={{ old('tugas_1') }}>
        
        {{-- TUGAS 2 --}}
        <label for="tugas_2" class="text-md font-semibold">Tugas 2</label>
        @error('tugas_2')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="number" max="100" min="1" name="tugas_2" id="tugas_2" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('tugas_2') invalid:border-red-500 @enderror  font-semibold" required value={{ old('tugas_2') }}>

        {{-- TUGAS 3 --}}
        <label for="tugas_3" class="text-md font-semibold">Tugas 3</label>
        @error('tugas_3')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="number" max="100" min="1" name="tugas_3" id="tugas_3" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('tugas_3') invalid:border-red-500 @enderror  font-semibold" required value={{ old('tugas_3') }}>

        {{-- UTS --}}
        <label for="pts" class="text-md font-semibold">PTS</label>
        @error('pts')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="number" max="100" min="1" name="pts" id="pts" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('pts') invalid:border-red-500 @enderror  font-semibold" required value={{ old('pts') }}>
    
        {{-- UAS --}}
        <label for="pas" class="text-md font-semibold">PAS</label>
        @error('pas')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="number" max="100" min="1" name="pas" id="pas" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('pas') invalid:border-red-500 @enderror  font-semibold" required value={{ old('pas') }}>

        {{-- KETERANGAN RAPORT --}}
        {{-- <label for="keterangan_raport" class="text-md font-semibold">Keterangan Raport</label>
        @error('keterangan_raport')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="keterangan_raport" id="keterangan_raport" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('keterangan_raport') invalid:border-red-500 @enderror  font-semibold" required value={{ old('keterangan_raport') }}> --}}
        
        <div class="flex justify-end">
            <button type="submit" class="bg-teal-400 px-5 py-2 flex w-min text-white hover:bg-teal-500 hover:-translate-y-1 transition ease-in rounded-md">Create</button>
        </div>
    </form>
</div>
@endsection