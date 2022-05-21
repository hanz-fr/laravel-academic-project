@extends('layouts.main')

@section('content')

<div class="bg-white h-screen justify-center p-10 overflow-y-auto w-full">
    <a href="/classes" class="text-xs sm:text-xs md:text-sm lg:text-md xl:text-md text-sky-400"><i class="fa fa-chevron-left leading-none text-sky-400"></i> Back</a>
    <h1 class="font-bold text-black mb-10 text-xl sm:text-xl md:text-xl lg:text-2xl xl:text-3xl xl:mx-20 lg:mx-16 md:mx-0 sm:mx-0 mt-10">Edit Class</h1>

    <form action="/classes/{{ $kelas->id }}" method="POST" class="flex flex-col sm:w-full md:w-full lg:w-1/2 xl:w-1/2 xl:mx-20 lg:mx-16 md:mx-0 sm:mx-0">
        @method('PUT')
        @csrf

        {{-- TEACHER ID --}}
        <label for="teacher_id" class="text-md font-semibold">Teacher</label>
        @error('teacher_id')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <select name="teacher_id" id="teacher_id" class="border-2 rounded-md border-slate-200 p-2 mb-5" autofocus required>
            @if($kelas->teacher_id)
            
                <option value="{{ $kelas->teacher_id }}" selected>{{ $kelas->teacher->nama }}</option>
                @foreach($teachers->where('id', '!=', $kelas->teacher->id ) as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
                @endforeach
            @else
                <option value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
            @endif
                
        </select>


        {{-- KELAS --}}
        <label for="kelas" class="text-md font-semibold">Kelas</label>
        @error('kelas')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="kelas" id="kelas" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('id') invalid:border-red-500 @enderror  font-semibold" required value={{ old('kelas', $kelas->kelas) }}>


        {{-- JURUSAN --}}
        <label for="jurusan" class="text-md font-semibold">Jurusan</label>
        @error('jurusan')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="jurusan" id="jurusan" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('id') invalid:border-red-500 @enderror  font-semibold" required value={{ old('jurusan', $kelas->jurusan) }}>
        
        
        {{-- TAHUN AJARAN --}}
        <label for="tahun_ajaran" class="text-md font-semibold">Tahun Ajaran</label>
        @error('tahun_ajaran')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('id') invalid:border-red-500 @enderror  font-semibold" required value={{ old('tahun_ajaran', $kelas->tahun_ajaran) }}>


        {{-- STATUS KELAS --}}
        <label for="status" class="text-md font-semibold">Status</label>
        @error('status')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <select name="status" id="status" class="border-2 rounded-md border-slate-200 p-2 mb-5" required> 
            @if(($kelas->status) == 'aktif')    
                <option value="{{ old('status', $kelas->status) }}" selected>{{ old('status', $kelas->status) }}</option>
                <option value="non-aktif">non-aktif</option>
            @elseif(($kelas->status) == 'non-aktif')
                <option value="{{ old('status', $kelas->status) }}" selected>{{ old('status', $kelas->status) }}</option>
                <option value="aktif">aktif</option>
            @else
                <option value="aktif">aktif</option>
                <option value="non-aktif">non-aktif</option>
            @endif
        </select>
        <div class="flex justify-end">
            <button type="submit" class="bg-teal-400 px-5 py-2 flex w-fit text-white hover:bg-teal-500 hover:-translate-y-1 transition ease-in rounded-md">Save Changes</button>
        </div>
    </form>
</div>

@endsection