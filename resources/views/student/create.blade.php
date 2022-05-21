@extends('layouts.main')

@section('content')

<div class="bg-white justify-center p-10 overflow-y-auto w-full h-screen">
    <div class="mb-7 ">
        <a href="/students" class="text-xs sm:text-xs md:text-sm lg:text-md xl:text-md text-sky-400"><i class="fa fa-chevron-left leading-none text-sky-400"></i> Back</a>
        <h1 class="font-bold text-black mt-12 text-xl sm:text-lg md:text-lg lg:text-xl xl:text-2xl xl:mx-20 lg:mx-16 md:mx-0 sm:mx-0">Create New Student</h1>
    </div>

    <form action="/students" method="POST" class="flex flex-col sm:w-full md:w-full lg:w-1/2 xl:w-1/2 xl:mx-20 lg:mx-16 md:mx-0 sm:mx-0">
        
        
        @csrf
        {{-- NIS SISWA --}}
        <label for="id" class="text-md font-semibold">NIS</label>
        @error('id')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="id" id="id" class="border-2 rounded-md  outline-teal-400 p-2 mb-5 @error('id') invalid:border-red-500 @enderror  font-semibold" autofocus required value={{ old('id') }}>
        
        
        {{-- NAMA SISWA --}}
        <label for="nama" class="text-md font-semibold">Nama</label>
        @error('nama')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="nama" id="nama" class="border-2 rounded-md outline-teal-400 p-2 mb-5 @error('nama') invalid:border-red-500 @enderror text-md" autofocus required value='{{ old('nama') }}'>


        {{-- KELAS SISWA --}}
        <label for="kelas_id" class="text-md font-semibold">Kelas</label>
        @error('kelas_id')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <select name="kelas_id" id="kelas_id" class="border-2 rounded-md border-slate-200 p-2 mb-5">
            @foreach ($kelas as $k)
                @if(old('kelas_id') == $k->id)
                    <option value="{{ $k->id }}" selected>{{ $k->kelas }}-{{ $k->jurusan }}</option>
                @else
                    <option value="{{ $k->id }}">{{ $k->kelas }}-{{ $k->jurusan }}</option>
                @endif
            @endforeach
        </select>


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


        {{-- AGAMA --}}
        <label for="agama" class="text-md font-semibold">Agama</label>
        @error('agama')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="agama" id="agama" class="border-2 rounded-md outline-teal-400 p-2 mb-5 @error('agama') invalid:border-red-500 @enderror text-md" autofocus required value='{{ old('agama') }}'>


        {{-- TEMPAT LAHIR --}}
        <label for="tempat_lahir" class="text-md font-semibold">Tempat Lahir</label>
        @error('tempat_lahir')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="tempat_lahir" id="tempat_lahir" class="border-2 rounded-md outline-teal-400 p-2 mb-5 @error('tempat_lahir') invalid:border-red-500 @enderror text-md" autofocus required value='{{ old('tempat_lahir') }}'>


        {{-- TANGGAL LAHIR --}}
        <label for="tanggal_lahir" class="text-md font-semibold">Tanggal Lahir</label>
        @error('tanggal_lahir')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="border-2 rounded-md outline-teal-400 p-2 mb-5 @error('tanggal_lahir') invalid:border-red-500 @enderror text-md" autofocus required value={{ old('tanggal_lahir') }}>


        {{-- ALAMAT --}}
        <label for="alamat" class="text-md font-semibold">Alamat</label>
        @error('alamat')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="alamat" id="alamat" class="border-2 rounded-md outline-teal-400 p-2 mb-5 @error('alamat') invalid:border-red-500 @enderror text-md" autofocus required value='{{ old('alamat') }}'>


        {{-- TAHUN AJARAN --}}
        <label for="tahun_ajaran" class="text-md font-semibold">Tahun Ajaran</label>
        @error('tahun_ajaran')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="border-2 rounded-md outline-teal-400 p-2 mb-5 @error('tahun_ajaran') invalid:border-red-500 @enderror text-md" autofocus required value='{{ old('tahun_ajaran') }}'>

        
        {{-- STATUS --}}
        <label for="status" class="text-md font-semibold">Status</label>
        @error('status')
        <div class="text-xs text-red-500">
            {{ $message }}
        </div>
        @enderror
        <select name="status" id="status" class="border-2 rounded-md border-slate-200 p-2 mb-5">
            <option value="sekolah">sekolah</option>
            <option value="tidak sekolah">tidak sekolah</option>
        </select>

        <div class="flex justify-end">
            <button type="submit" class="bg-teal-400 px-5 py-2 flex w-min text-white hover:bg-teal-500 hover:-translate-y-1 transition ease-in rounded-md">Create</button>
        </div>
    </form>
</div>

@endsection