<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    public function create() 
    {
        return view('register');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'You have registered');
    }

    public function loginForm() 
    {
        return view('login');
    }

    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            $time = date('H:i:s');
            session()->flash('success', "You have logged in ". Auth::user()->username);
          
            return redirect()->route('home');
            
        }
        
        return redirect()->back()->withErrors('Incorrect email or password');
    }

    public function logout(Request $request) 
    {
        Auth::logout();

        return redirect()->route('home')->withErrors('You have logged out');
    }


}
