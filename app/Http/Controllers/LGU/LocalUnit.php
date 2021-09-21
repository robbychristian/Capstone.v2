<?php

namespace App\Http\Controllers\LGU;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LocalUnit extends Controller
{
    function check(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.exists'=>'This email does not exists'
        ]);
        
        $creds = $request->only('email','password');
        if(Auth::guard('local_unit')->attempt($creds)){
            return redirect()->route('lgu.home');
        } else {
            return redirect()->route('lgu.login')->with('fail', 'Incorrect credentials');
        }

    }
}
