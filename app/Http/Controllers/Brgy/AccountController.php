<?php

namespace App\Http\Controllers\Brgy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrgyOfficial;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brgy_official = BrgyOfficial::find($id);
        return view('features.account', [
            'brgy_official' => $brgy_official
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|max:255',
            'mname' => 'required|max:255',
            'lname' => 'required|max:255',
            'cnum' => 'required|max:255',
            'curr_pass' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Old Password didn\'t match!');
                    }
                },
            ],
            'new_pass' => 'required|min:8',
            'conf_pass' => 'required|min:8|same:new_pass',
        ], $messages = [
            'fname.required' => 'The first name field must not be empty!',
            'mname.required' => 'The middle name field must not be empty!',
            'lname.required' => 'The last name field must not be empty!',
            'cnum.required' => 'The contact number field must not be empty!',
            //'cnum.unique' => 'The contact number  has already been taken!',
            'curr_pass.required' => 'The current password field must not be empty!',
            'new_pass.required' => 'The new password field must not be empty!',
            'conf_pass.required' => 'The confirm password field must not be empty!',
            'conf_pass.same' => 'Confirm password should match new password!',
        ]);

        if ($validator->fails()) {
            return redirect('/brgy_official/account/' . Auth::user()->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = BrgyOfficial::where('id', $id)->update([
                'name' => $request->input('fname') . ' ' . $request->input('mname') . ' ' . $request->input('lname'),
                'email' => $request->input('email'),
                'contact_no' => $request->input('cnum'),
                'password' => Hash::make($request->input('new_pass'))
            ]);

            return redirect('/brgy_official/account/' . Auth::user()->id . '/edit')->with('success', 'Your account has been successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
