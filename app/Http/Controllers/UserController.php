<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('register', [
            'title' => 'Register'
        ]);
    }
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'unique:users', 'min:3', 'max:255'],
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:3|max:255'
        ]);
        // $validateData['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        // $request->session()->flash('success', 'Registration successful!. please login');
        return redirect('/login')->with('success', 'Registration successful!. please login');
    }
    public function login()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }
}
