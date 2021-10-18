<?php

namespace App\Http\Controllers\Brgy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrgyOfficial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BrgyOfficialController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    function check(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.exists' => 'This email does not exists'
        ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min: 8'
        ]);

        if ($validator->fails()) {
            return redirect('/brgy_official/login/')
                ->withErrors($validator)
                ->withInput();
        } else {
            $creds = $request->only('email', 'password');
            if (Auth::guard('brgy_official')->attempt($creds)) {
                return redirect()->route('brgy_official.home');
            } else {
                return redirect()->route('brgy_official.login')->with('fail', 'Incorrect credentials');
            }
        }
    }
}
