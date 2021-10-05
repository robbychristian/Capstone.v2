<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrgyOfficial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ManageBrgyOfficialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brgy_officials = BrgyOfficial::all();
        return view('features.managebrgyofficial', [
            'brgy_officials' => $brgy_officials
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.addbrgyofficial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|max:255',
            'mname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|unique:brgy_officials',
            'brgy_pos' => 'required',
            'cnum' => 'required|max:255',
            'pass' => 'required|min:8',
            'conf_pass' => 'required|min:8|same:pass',
            'cbox' => 'required'
        ], $messages = [
            'fname.required' => 'The first name field is required!',
            'mname.required' => 'The middle name field is required!',
            'lname.required' => 'The last name field is required!',
            'address.required' => 'The home address field is required!',
            'brgy_pos.required' => 'The barangay position field is required!',
            'pass.required' => 'The password field is required!',
            'pass.min' => 'Password must be at least 8 characters',
            'conf_pass.required' => 'The confirm password field is required!',
            'conf_pass.same' => 'Password mismatch!',
            'cbox.required' => 'Agree to terms and conditions',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/managebrgy_official/create')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $brgy_officials = BrgyOfficial::create([
                'email' => $request['email'],
                'password' => $request['pass'],
                'name' => $request['fname'].' '.$request['mname'].' '.$request['lname'],
                'user_role' => 3,
                'brgy_position' => $request['brgy_pos'],
                'brgy_loc' => $request['brgy'],
                'contact_no' => $request['cnum']
            ]);

            return redirect('/admin/managebrgy_official')->with('success', 'Barangay Official has been added');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brgyofficial = BrgyOfficial::find($id);
        $brgyofficial->delete();
        return redirect('admin/managebrgy_official/');
    }
}
