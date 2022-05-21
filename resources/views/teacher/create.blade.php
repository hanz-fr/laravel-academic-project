@extends('layouts.main')

@section('content')

<div class="bg-white justify-center p-10 overflow-y-auto w-full h-screen">
    <div class="mb-7">
        <a href="/teachers" class="text-xs sm:text-xs md:text-sm lg:text-md xl:text-md text-sky-400"><i class="fa fa-chevron-left leading-none text-sky-400"></i> Back</a>
        <h1 class="font-bold text-black mt-12 text-xl sm:text-lg md:text-lg lg:text-xl xl:text-2xl xl:mx-20 lg:mx-16 md:mx-0 sm:mx-0">Create New Teacher</h1>
    </div>

    <form action="/teachers" method="POST" class="flex flex-col sm:w-full md:w-full lg:w-1/2 xl:w-1/2 xl:mx-20 lg:mx-16 md:mx-0 sm:mx-0">
        
        @csrf
        {{-- NIP GURU --}}
        <label for="id" class="text-md font-semibold">NIP</label>
        @error('id')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="id" id="id" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('id') invalid:border-red-500 @enderror  font-semibold" autofocus required value={{ old('id') }}>
        
        
        {{-- NAMA GURU --}}
        <label for="nama" class="text-md font-semibold">Nama</label>
        @error('nama')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="nama" id="nama" class="border-2 rounded-md outline-teal-400 p-2 mb-5 @error('nama') invalid:border-red-500 @enderror text-md" autofocus required value='{{ old('nama') }}'>


        {{-- JENIS KELAMIN --}}
        <label for="jenis_kelamin" class="text-md font-semibold">Jenis Kelamin</label>
        @error('jenis_kelamin')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <select name="jenis_kelamin" id="jenis_kelamin" class="border-2 rounded-md border-slate-200 p-2 mb-5">
            @if(old('jenis_kelamin') == 'Laki-laki')    
                <option value="{{ old('jenis_kelamin') }}" selected>{{ old('jenis_kelamin') }}</option>
                <option value="Perempuan">Perempuan</option>
            @elseif(old('jenis_kelamin') == 'Perempuan')
                <option value="{{ old('jenis_kelamin') }}" selected>{{ old('jenis_kelamin') }}</option>
                <option value="Laki-laki">Laki-laki</option>
            @else
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            @endif
        </select>


        {{-- ALAMAT --}}
        <label for="alamat" class="text-md font-semibold">Alamat</label>
        @error('alamat')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="alamat" id="alamat" class="border-2 rounded-md outline-teal-400 p-2 mb-5 @error('alamat') invalid:border-red-500 @enderror text-md" autofocus required value='{{ old('alamat') }}'>


        {{-- NOMOR HP --}}
        <label for="nomor_hp" class="text-md font-semibold">Nomor HP</label>
        @error('nomor_hp')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="nomor_hp" id="nomor_hp" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('nomor_hp') invalid:border-red-500 @enderror  font-semibold" autofocus required value={{ old('nomor_hp') }}>
        
        
        {{-- MATA PELAJARAN --}}
        <label for="subject_id" class="text-md font-semibold">Pelajaran</label>
        @error('subject_id')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <div class="flex flex-col md:inline-block bg-gray-100 rounded-lg p-5">
            @foreach ($subjects as $subject) 
            <span>
                <input type="checkbox" name="subject_id[]" value="{{ $subject->id }}" class="appearance-none border w-4 h-4 border-gray-300 rounded-full bg-white checked:bg-teal-400 checked:border-teal-400 focus:outline-none transition duration-200 bg-no-repeat bg-center bg-contain cursor-pointer"><label for="subject_id" class="mr-3"> {{ $subject->nama }}</label>
            </span>
            @endforeach
        </div>

        <div class="flex justify-end mt-10">
            <button type="submit" class="bg-teal-400 px-5 py-2 flex w-min text-white hover:bg-teal-500 hover:-translate-y-1 transition ease-in rounded-md">Create</button>
        </div>
    </form>
</div>

@endsection