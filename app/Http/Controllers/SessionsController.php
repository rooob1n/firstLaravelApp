<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        
       $user = User::where('email', $request->Email)->first();

       if($user){
            if(!Hash::check($request->Password, $user->password)) {
                return back()->withErrors([
                    'message'=>'Incorrect Password.'
                ]);
            }
            else if(!$user->hasVerifiedEmail()){
                    return back()->withErrors([
                        'message'=>'Please verify your account.'
                    ]);
            }
            else{
                    auth()->login($user);
            }
       }else{
            return back()->withErrors([
                'message'=>'Account not found!'
            ]);
       }

       session([
           'id'=>$user->id,
           'name'=>$user->name,
       ]);

       return redirect()
                ->home()
                ->with(session()->flash('message','Welcome!'));
    }
    

    public function destroy(){

        auth()->logout(); 

        return redirect()->home();
    }
}
