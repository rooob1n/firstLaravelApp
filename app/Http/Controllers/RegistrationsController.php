<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\registerEmail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RegistrationsController extends Controller
{
    public function create(){
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'Username'=>'required|string',
            'Password'=>'required|confirmed|min:4|string',
            'Email'=>'required|email|unique:users|string'
        ]);

        $user = User::create([
            'name'=>request('Username'),
            'email'=>request('Email'),
            'password'=>Hash::make(request('Password'))
        ]);


        Mail::to($user)->send(new registerEmail($user));

       /* auth()->login($user);

       session()->flash('message','Thank you for signing in!'); */

       return redirect()->route('login')->with(session()->flash('message', 'Your account has been created. Please check email for verification link.'));
    }
}
