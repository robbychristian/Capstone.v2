<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use DataTables;

class ManageResidentController extends Controller
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
                ->select('users.*', 'user_profiles.*')
                ->where('users.brgy_loc', Auth::user()->brgy_loc)
                ->whereIn('users.user_role', [2, 3])
                //->where('users.user_role', 2)
                //->orWhere('users.user_role', 3)
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . \URL::route('user.manageresident.show', $row->id) . ' "data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                    $btn = $btn . '<a href="' . \URL::route('user.manageresident.edit', $row->id) . '"data-id="' . $row->id . '" class="btn btn-warning btn-circle btn-sm ml-2" id="actionsbtn"><i class="fas fa-user-cog"></i></a>';

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

        return view('features.manageresident', [
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

        return view('features.addresidents');
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
            'email' => 'required|email|unique:users',
            'address' => 'required|max:255',
            'cnum' => 'required|max:255|unique:user_profiles,contact_no',
            'mbday' => 'required',
            'dbday' => 'required|max:31|integer',
            'ybday' => 'required|max:2100|integer',
            'pass' => 'required|min:8',
            'conf_pass' => 'required|min:8|same:pass',
            'file' => 'required|mimes:jpeg,png,jpg',
            'cbox' => 'accepted'
        ], $messages = [
            'fname.required' => 'The first name field is required!',
            'mname.required' => 'The middle name field is required!',
            'lname.required' => 'The last name field is required!',
            'address.required' => 'The home address field is required!',
            'cnum.required' => 'The contact number field must not be empty!',
            'cnum.unique' => 'The contact number  has already been taken!',
            'mbday.required' => 'The birth month field is required!',
            'dbday.required' => 'The birth day field is required!',
            'dbday.max' => 'The field must not exceed over 31!',
            'ybday.required' => 'The birth year field is required!',
            'ybday.max' => 'Enter a valid year',
            'pass.required' => 'The password field is required!',
            'pass.min' => 'Password must be at least 8 characters',
            'conf_pass.required' => 'The confirm password field is required!',
            'conf_pass.same' => 'Password mismatch!',
            'file.required' => 'An image upload is required',
            'cbox.accepted' => 'Terms and conditions must be confirmed!',
        ]);

        if ($validator->fails()) {
            return redirect('/user/manageresident/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('file')) {
                $file = $request->file('file')->getClientOriginalName();

                $user = User::create([
                    'user_role' => 4,
                    'email' => $request['email'],
                    'first_name' => $request['fname'],
                    'last_name' => $request['lname'],
                    'brgy_loc' => $request['brgy'],
                    'email_verified_at' => Carbon::now(),
                    'is_blocked' => 0,
                    'is_deactivated' => 0,
                    'password' => Hash::make($request['pass']),
                ]);

                $user_profile = UserProfile::create([
                    'user_email' => $request['email'],
                    'middle_name' => $request['mname'],
                    'home_add' => $request['address'],
                    'contact_no' => $request['cnum'],
                    'birth_day' => $request['mbday'] . '/' . $request['dbday'] . '/' . $request['ybday'],
                    'profile_pic' => 'noimage.jpg',
                ]);
                $request->file('file')->storeAs('profile_pics', $user->id . '/' . $file, '');
                return redirect('/user/manageresident')->with('success', 'User successfully added!');
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
        $user = User::find($id);
        $profile = UserProfile::find($id);

        return view('features.viewresident', [
            'user' => $user,
            'profile' => $profile

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $profile = UserProfile::find($id);

        return view('features.editresident', [
            'user' => $user,
            'profile' => $profile

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
        //
    }


    public function block($id)
    {
        //$isBlocked = DB::table('users')
        //    ->where('id', $id)
        //    ->update(['is_blocked' => true]);

        $isBlocked = User::find($id);
        $isBlocked->is_blocked = true;
        $isBlocked->save();
        
        return redirect('user/manageresident/' . $id . '/edit')->with('success', 'User account successfully blocked!');
    }
    public function unblock($id)
    {
        //$isBlocked = DB::table('users')
        //    ->where('id', $id)
        //    ->update(['is_blocked' => false]);
        $isBlocked = User::find($id);
        $isBlocked->is_blocked = false;
        $isBlocked->save();
        
        return redirect('user/manageresident/' . $id . '/edit')->with('success', 'User account successfully unblocked!');
    }
    public function deactivate($id)
    {
        //$isBlocked = DB::table('users')
        //    ->where('id', $id)
        //    ->update(['is_deactivated' => true]);
        $isBlocked = User::find($id);
        $isBlocked->is_deactivated = true;
        $isBlocked->save();
        
        return redirect('user/manageresident/' . $id . '/edit')->with('success', 'User account successfully deactivated!');
    }
    public function activate($id)
    {
        //$isBlocked = DB::table('users')
        //    ->where('id', $id)
        //    ->update(['is_deactivated' => false]);
        $isBlocked = User::find($id);
        $isBlocked->is_deactivated = false;
        $isBlocked->save();
        
        return redirect('user/manageresident/' . $id . '/edit')->with('success', 'User account successfully activated!');
    }

    public function approve($id)
    {
        //$isBlocked = DB::table('users')
        //    ->where('id', $id)
        //    ->update(['is_valid' => 1]);
        $isBlocked = User::find($id);
        $isBlocked->is_valid = true;
        $isBlocked->save();
        
        return redirect('user/manageresident/' . $id . '/edit')->with('success', 'User account successfully verified!');
    }

    public function disapprove($id)
    {
        //$isBlocked = DB::table('users')
        //    ->where('id', $id)
        //    ->update(['is_valid' => 0]);
        $isBlocked = User::find($id);
        $isBlocked->is_valid = false;
        $isBlocked->save();
        
        return redirect('user/manageresident/' . $id . '/edit')->with('success', 'User account successfully unverified!');
    }

    public function subordinates($id)
    {
        //User::find($id)->update(['user_role' => 3]);
        $user = User::find($id);
        $user->user_role = 3;
        $user->save();

        return response()->json(['message' => 'The user is now a barangay official!']);
    }

    public function residents($id)
    {
        //User::find($id)->update(['user_role' => 2]);
        $user = User::find($id);
        $user->user_role = 2;
        $user->save();

        return response()->json(['message' => 'The user is now a resident!']);
    }
}
