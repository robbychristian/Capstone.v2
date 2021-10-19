<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.exists' => 'This email does not exists'
        ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:admins,email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/login')
                ->withErrors($validator)
                ->withInput();
        } else {
            $creds = $request->only('email', 'password');
            if (Auth::guard('admin')->attempt($creds)) {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
            }
        }
    }
}
