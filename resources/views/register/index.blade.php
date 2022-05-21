@extends('layouts.authenticate')

@section('content')

<div class="mx-auto flex justify-center my-20">
    <div class="bg-white rounded-md shadow-sm">
        <h1 class="font-bold text-3xl flex justify-center mt-10">Sign Up</h1>
        <form action="/register" method="POST" class="flex flex-col py-14 px-20">
            
            @csrf
            {{-- ADMIN NAME --}}
            <label for="nama">Name</label>
            <input type="text" name="nama" id="nama"  class="border outline-teal-400 rounded p-2 @error('nama') invalid:border-red-500 @enderror" required value={{ old('nama') }}>
            @error('nama')
            <div class="text-xs text-red-500">
                {{ $message }}
            </div>
            @enderror


            {{-- ADMIN USERNAME --}}
            <label for="username" class="mt-5">Username</label>
            <input type="text" name="username" id="username"  class="border outline-teal-400 rounded p-2  @error('username') invalid:border-red-500 @enderror" required value={{ old('username') }}>
            @error('username')
            <div class="text-xs text-red-500">
                {{ $message }}
            </div>
            @enderror


            {{-- ADMIN EMAIL --}}
            <label for="email" class="mt-5">Email</label>
            <input type="email" name="email" id="email"  class="border outline-teal-400 rounded p-2  @error('email') invalid:border-red-500 @enderror focus:border-sky-400" required value={{ old('email') }}>
            @error('email')
            <div class="text-xs text-red-500">
                {{ $message }}
            </div>
            @enderror


            {{-- ADMIN PASSWORD --}}
            <label for="password" class="mt-5">Password</label>
            <input type="password" name="password" id="password"  class="border outline-teal-400 rounded p-2 @error('password') invalid:border-red-500 @enderror focus:border-sky-400" required>
            @error('password')
            <div class="text-xs text-red-500">
                {{ $message }}
            </div>
            @enderror


            <button type="submit" class="flex justify-end mt-10 bg-teal-400 w-fit ml-64 px-3 py-2 rounded-md text-white transition ease-in hover:-translate-y-1 hover:shadow-md hover:bg-teal-600 text-sm">Sign Up</button>
        </form>
        <center class="mb-10"><a href="/login" class="text-sm w-fit text-sky-400 underline">Log In</a></center>
    </div>
</div>

@endsection