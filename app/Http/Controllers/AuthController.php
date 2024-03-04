<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function logout(){
        Auth::logout(); 
        request()->session()->invalidate(); 
        request()->session()->regenerateToken(); 

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

    public function store(Request $request){
       
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedData)) {
            
            return redirect('/dashboard')->with('success', 'Login successful.');
        } else {
         
            return back()->withInput()->withErrors(['email' => 'Invalid credentials. Check the email address and password entered.']);
        }
    }
}

