@extends('layouts.authenticate')

@section('content')

@if(session()->has('success'))

<div class="bg-green-500 px-5 py-3 flex flex-row justify-center shadow-sm absolute" style="left: 0; right: 0; margin-left: auto; margin-right: auto;">
    <p class="text-white font-bold">{{ session('success') }}</p>
    <button class="text-lg font-bold text-white ml-10 active:text-gray-200" onclick="closeAlert(event)"><i class="fa fa-times ml-2 sm:text-xs md:text-md lg:text-lg leading-none"></i></button>
</div>
   
@endif
    
@if(session()->has('error'))
<div class="bg-red-500 px-5 py-3 flex flex-row justify-center shadow-sm absolute" style="left: 0; right: 0; margin-left: auto; margin-right: auto;">
    <p class="text-white font-bold">{{ session('error') }}</p>
    <button class="text-lg font-bold text-white active:text-gray-200" onclick="closeAlert(event)"><i class="fa fa-times ml-2 sm:text-xs md:text-md lg:text-lg leading-none"></i></button>
</div>
@endif 


<div class="mx-auto flex justify-center my-32">
    <div class="bg-white rounded-md shadow-sm">
        <h1 class="font-bold text-3xl flex justify-center mt-10">Sign In</h1>
        <form action="/login" method="POST" class="flex flex-col py-14 px-20">

            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="border rounded outline-teal-400 p-2 mb-5 @error('email') invalid:border-red-500 @enderror" autofocus required value={{ old('email') }}>
            @error('email')
            <div class="text-xs text-red-500 mt-3">
                {{ $message }}
            </div>
            @enderror

            <label for="password">Password</label>
            <input type="password" name="password" id="password"  class="border outline-teal-400 rounded p-2" autofocus required>

            <button type="submit" class="flex justify-end mt-10 bg-teal-400 ml-36 px-3 py-2 rounded-md text-white transition ease-in hover:-translate-y-1 hover:shadow-md hover:bg-teal-600 text-sm">Sign in</button>
        </form>
        <center class="mb-8"><a href="/register" class="text-sm w-fit text-sky-400 underline">Sign Up</a></center>
    </div>
</div>

<script>
    function closeAlert(event){
      let element = event.target;
      while(element.nodeName !== "BUTTON"){
        element = element.parentNode;
      }
      element.parentNode.parentNode.removeChild(element.parentNode);
    }
  </script>

@endsection