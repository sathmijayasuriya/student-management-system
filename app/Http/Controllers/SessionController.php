<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store()
    
    {
        //validate
        //attempt to login
        // regenerate the session token
        //redirect somewhere

        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if( ! Auth::attempt($attributes)){
            throw ValidationException ::withMessages([
                'email' => 'Invalid credentials. Please try again.',
                // 'password' => 'Please check your password and try again.',
                
            ]);
        }
        request()->session()->regenerate(); //regenerate the session token in every session
        return redirect()->route('dashboard');
        
        // dd(request()->all());
    }
    public function destroy()
    {
        Auth::logout();
        // return redirect()->route('dashboard');
        return redirect('/login'); 

    }  

}