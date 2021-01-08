<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\registerEmail;
use Carbon\Carbon;

class RegistrationsController extends Controller
{
    public function create(){
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'txtUsername'=>'required',
            'txtPassword'=>'required|confirmed',
            'txtEmail'=>'required|email'
        ]);

        $user = User::create([
            'name'=>request('txtUsername'),
            'email'=>request('txtEmail'),
            'password'=>request('txtPassword')
        ]);

        Mail::to($user)->send(new registerEmail($user));

       /* auth()->login($user);

       session()->flash('message','Thank you for signing in!'); */

       return redirect()->home()->with(session()->flash('message', 'Your account has been created. Please check email for verification link.'));
    }
}
