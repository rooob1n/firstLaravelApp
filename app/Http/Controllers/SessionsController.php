<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    public function __construct(){
        $this->middleware('guest',['except'=>'destroy']);
    }

    public function create(){
        $status = ['hide'=>true];
        return view('sessions.create',compact('status'));
    }

    public function store(Request $request){
        
       $user = User::where('email', $request->txtEmail)->where('password', $request->txtPassword)->first();

      

       if($user) {
            auth()->login($user);
       }else {
            return back()->withErrors([
                'message'=>'Please check your credentials.'
            ]);
       }

       session([
           'id'=>$user->id,
           'name'=>$user->name,
       ]);

       session()->flash('message','Welcome!');

       return redirect()->home();
    }
    

    public function destroy(){

        auth()->logout(); 

        return redirect()->home();
    }
}
