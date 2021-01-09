<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class emailVerificationController extends Controller
{
    public function verify($id)
    {

      $user = User::find($id);

      $user->email_verified_at = Carbon::now();
 
      $user->save();

      return redirect()
            ->route('login')
            ->with(session()->flash('message', 'Your account has beed activated, please try to login!'));
    }
}
