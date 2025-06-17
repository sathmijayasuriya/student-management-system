<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Models\User;
class RegisteredAdminController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        //validate the request data
        //create the user and db
        //login 
        //redirect somewhere
        
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email','unique:users,email'],
            // 'email_verified_at' => 'nullable|date',
            'password' => ['required', Password::min(6), 'confirmed'],
            //'remember_token' => 'nullable|string|max:100',
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $user = User::create($attributes);
        Auth::login($user); 
        
       return redirect()->route('dashboard');
        // dd(request()->all());
    }
}