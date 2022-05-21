@extends('layouts.main')

@section('content')

<div class="bg-white justify-center p-10 overflow-y-auto w-full h-screen">
    <div class="mb-7">
        <a href="/classes" class="text-xs sm:text-xs md:text-sm lg:text-md xl:text-md text-sky-400"><i class="fa fa-chevron-left leading-none text-sky-400"></i> Back</a>
        <h1 class="font-bold text-black mt-12 text-xl sm:text-lg md:text-lg lg:text-xl xl:text-2xl xl:mx-20 lg:mx-16 md:mx-0 sm:mx-0">Create New Classes</h1>
    </div>

    <form action="/classes" method="POST" class="flex flex-col sm:w-full md:w-full lg:w-1/2 xl:w-1/2 xl:mx-20 lg:mx-16 md:mx-0 sm:mx-0 ">
        
        @csrf
        {{-- TEACHER ID --}}
        <label for="teacher_id" class="text-md font-semibold">Teacher</label>
        @error('teacher_id')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <select name="teacher_id" id="teacher_id" class="border-2 rounded-md border-slate-200 p-2 mb-5" autofocus required>
            @foreach($teachers as $teacher)
                <option value={{ $teacher->id }}>{{ $teacher->nama }}</option>
            @endforeach
        </select>


        {{-- KELAS --}}
        <label for="kelas" class="text-md font-semibold">Kelas</label>
        @error('kelas')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="kelas" id="kelas" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('id') invalid:border-red-500 @enderror  font-semibold" required value={{ old('kelas') }}>


        {{-- JURUSAN --}}
        <label for="jurusan" class="text-md font-semibold">Jurusan</label>
        @error('jurusan')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="jurusan" id="jurusan" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('id') invalid:border-red-500 @enderror  font-semibold" required value={{ old('jurusan') }}>
        
        
        {{-- TAHUN AJARAN --}}
        <label for="tahun_ajaran" class="text-md font-semibold">Tahun Ajaran</label>
        @error('tahun_ajaran')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('id') invalid:border-red-500 @enderror  font-semibold" required value={{ old('tahun_ajaran') }}>


        {{-- STATUS KELAS --}}
        <label for="status" class="text-md font-semibold">Status</label>
        @error('status')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <select name="status" id="status" class="border-2 rounded-md border-slate-200 p-2 mb-5" required> 
            @if(old('status') == 'aktif')    
                <option value="{{ old('status') }}" selected>{{ old('status') }}</option>
                <option value="non-aktif">non-aktif</option>
            @elseif(old('status') == 'non-aktif')
                <option value="{{ old('status') }}" selected>{{ old('status') }}</option>
                <option value="aktif">aktif</option>
            @else
                <option value="aktif">aktif</option>
                <option value="non-aktif">non-aktif</option>
            @endif
        </select>
        <div class="flex justify-end">
            <button type="submit" class="bg-teal-400 px-5 py-2 flex w-min text-white hover:bg-teal-500 hover:-translate-y-1 transition ease-in rounded-md">Create</button>
        </div>
    </form>
</div>
@endsection