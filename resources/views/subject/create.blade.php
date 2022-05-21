@extends('layouts.main')

@section('content')

<div class="bg-white justify-center p-10 overflow-y-auto w-full h-screen">
    <div class="mb-7">
        <a href="/subjects" class="text-xs sm:text-xs md:text-sm lg:text-md xl:text-md text-sky-400"><i class="fa fa-chevron-left leading-none text-sky-400"></i> Back</a>
        <h1 class="font-bold text-black mt-12 text-xl sm:text-lg md:text-lg lg:text-xl xl:text-2xl xl:mx-20 lg:mx-16 md:mx-0 sm:mx-0">Create New Subject</h1>
    </div>

    <form action="/subjects" method="POST" class="flex flex-col sm:w-full md:w-full lg:w-1/2 xl:w-1/2 xl:mx-20 lg:mx-16 md:mx-0 sm:mx-0">
        
        @csrf
        {{-- NAMA MAPEL --}}
        <label for="nama" class="text-md font-semibold">Nama Pelajaran</label>
        @error('nama')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="nama" id="nama" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('id') invalid:border-red-500 @enderror  font-semibold" required value={{ old('nama') }}>
        
        
        {{-- KETERANGAN --}}
        <label for="keterangan" class="text-md font-semibold">Keterangan</label>
        @error('keterangan')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="keterangan" id="keterangan" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('id') invalid:border-red-500 @enderror  font-semibold" required value={{ old('keterangan') }}>

        <div class="flex justify-end">
            <button type="submit" class="bg-teal-400 px-5 py-2 flex w-min text-white hover:bg-teal-500 hover:-translate-y-1 transition ease-in rounded-md">Create</button>
        </div>
    </form>
</div>
@endsection