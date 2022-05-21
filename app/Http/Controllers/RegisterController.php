<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'iStudent | Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:5|max:255',
            'username' => 'required|min:5|max:100|unique:admins',
            'email' => 'required|email:dns|unique:admins',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Admin::create($validatedData);

        return redirect('/login')->with('success', 'Registered successfully. Please login.');
    }
}
