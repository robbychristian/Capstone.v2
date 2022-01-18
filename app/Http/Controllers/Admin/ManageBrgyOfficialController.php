<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrgyOfficial;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use DataTables;

class ManageBrgyOfficialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users')
                ->join('user_profiles', 'users.email', '=', 'user_profiles.user_email')
                ->where('users.user_role', '>=',3)
                ->select('users.*', 'user_profiles.*')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . \URL::route('admin.manageresident.show', $row->id) . ' "data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                    $btn = $btn . '<a href="' . \URL::route('admin.manageresident.edit', $row->id) . '"data-id="' . $row->id . '" class="btn btn-warning btn-circle btn-sm ml-2" id="actionsbtn"><i class="fas fa-user-cog"></i></a>';

                    return $btn;
                })

                ->addColumn('is_valid', function ($row) {
                    if ($row->is_valid == '1') {
                        return '<label class="badge badge-success">Verified</label>';
                    } else {
                        return '<label class="badge badge-danger">Not yet verified</label>';
                    }
                })

                ->addColumn('full_name', function ($row) {
                    return '<div class="media">
                    <img class="mr-3 float-left rounded-circle" width="60" height="60" src="' . \URL::asset('KabisigGit/storage/app/public/profile_pics/' . $row->id . '/' . $row->profile_pic) . '">
                    <div class="media-body">
                      <h6>' . $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name . '</h6>
                      <small class="text-muted">' . $row->user_email . '</small>
                    </div>
                  </div>';
                })

                ->addColumn('user_role', function ($row) {
                    if ($row->user_role == '2') {
                        return '<label class="badge badge-primary">Resident</label>';
                    } else if ($row->user_role == '3') {
                        return '<label class="badge badge-info">Barangay Official</label>';
                    } else if ($row->user_role == '4') {
                        return '<label class="badge badge-secondary">Barangay Secretary</label>';
                    } else if ($row->user_role == '5') {
                        return '<label class="badge badge-warning">Barangay Co-Chairman</label>';
                    } else if ($row->user_role == '6') {
                        return '<label class="badge badge-success">Barangay Chairman</label>';
                    } else if ($row->user_role == '7') {
                        return '<label class="badge badge-dark">Local Government Unit Officer</label>';
                    }
                })

                ->rawColumns(['action', 'is_valid', 'full_name', 'user_role'])
                ->make(true);
        }

        $users = DB::table('users')
            ->join('user_profiles', 'users.email', '=', 'user_profiles.user_email')
            ->select('users.*', 'user_profiles.*')
            ->where('users.user_role', 2)
            ->get();

        return view('features.managebrgyofficial', [
            'users' => $users
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
            'brgy' => 'required',
            'cnum' => 'required|max:255|unique:brgy_officials,contact_no',
            'pass' => 'required|min:8',
            'conf_pass' => 'required|min:8|same:pass',
            'file' => 'required|mimes:jpeg,png,jpg',
            'cbox' => 'accepted'
        ], $messages = [
            'fname.required' => 'The first name field is required!',
            'mname.required' => 'The middle name field is required!',
            'lname.required' => 'The last name field is required!',
            'address.required' => 'The home address field is required!',
            'brgy_pos.required' => 'The barangay position field is required!',
            'brgy.required' => 'The barangay field is required!',
            'cnum.required' => 'The contact number field must not be empty!',
            'cnum.unique' => 'The contact number  has already been taken!',
            'pass.required' => 'The password field is required!',
            'pass.min' => 'Password must be at least 8 characters',
            'conf_pass.required' => 'The confirm password field is required!',
            'conf_pass.same' => 'Password mismatch!',
            'file.required' => 'An image upload is required',
            'cbox.accepted' => 'Terms and conditions must be confirmed!',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/managebrgy_official/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('file')) {
                $file = $request->file('file')->getClientOriginalName();
                $brgy_officials = BrgyOfficial::create([
                    'email' => $request['email'],
                    'password' => Hash::make($request['pass']),
                    'name' => $request['fname'] . ' ' . $request['mname'] . ' ' . $request['lname'],
                    'user_role' => 3,
                    'brgy_position' => $request['brgy_pos'],
                    'brgy_loc' => $request['brgy'],
                    'profile_pic' => $file,
                    'contact_no' => $request['cnum']
                ]);
                $request->file('file')->storeAs('brgy_profile_pic', $brgy_officials->id . '/' . $file, '');
                return redirect('/admin/managebrgy_official')->with('success', 'Barangay Official has been added!');
            } else {
                dd('waow its wrong');
            }
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
    public function decrementRole($id)
    {
        $oldUserRole = DB::table('users')
            ->where('id', $id)
            ->pluck('user_role')->toArray();
        $userRole = implode($oldUserRole);

        $newUserRole = DB::table('users')
            ->where('id', $id)
            ->update(['user_role' => $userRole - 1]);
        return redirect('admin/manageresident')->with('Success', 'User has been demoted');
    }
}
