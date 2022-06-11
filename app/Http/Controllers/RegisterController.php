<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        // return request()->all();
        $validatedData = $request->validate([
            'name' => 'required|max:255', // menggunakan standard penulisan "|"
            'username' => ['required', 'min:3', 'max:255', 'unique:users'], // menggunakan syntax array (opsional)
            'email' => 'required|email:dns|unique:users', //unique yang mengecek data di table users. dns agar type email nya bener
            'password' => 'required|min:5|max:255'
        ]);

        // enkripsi password ada 2 macam
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData); //create data berdasarkan input

        // pesan alert ketika success register
        // $request->session()->flash('success', 'Registration seccessfull! Please login');

        //dengan membawa pesan bernama success yang berisi registration success
        return redirect('/login')->with('success', 'Registration seccessfull! Please login'); //kembali ke halaman login
    }
}
