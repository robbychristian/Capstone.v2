<?php

namespace App\Http\Controllers\Brgy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ManageResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$users = DB::table('users')
            ->join('user_profiles', 'users.email', '=', 'user_profiles.user_email')
            ->select('users.*', 'user_profiles.*')
            ->where('users.brgy_loc', Auth::user()->brgy_loc)
            ->get()
            ->paginate(15); */
        $users = User::join('user_profiles', 'users.email', '=', 'user_profiles.user_email')
            ->select('users.*', 'user_profiles.*')
            ->where('users.brgy_loc', Auth::user()->brgy_loc)
            ->paginate(15);
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
            'file.required' => 'An image upload is required!',
            'cbox.accepted' => 'Terms and conditions must be confirmed!',
        ]);

        if ($validator->fails()) {
            return redirect('/brgy_official/manageresident/create')
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
                return redirect('/brgy_official/manageresident')->with('success', 'User successfully added!');
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
        //
    }

    public function block($id)
    {
        $isBlocked = DB::table('users')
            ->where('id', $id)
            ->update(['is_blocked' => true]);
        return redirect('brgy_official/manageresident');
    }
    public function unblock($id)
    {
        $isBlocked = DB::table('users')
            ->where('id', $id)
            ->update(['is_blocked' => false]);
        return redirect('brgy_official/manageresident');
    }
    public function deactivate($id)
    {
        $isBlocked = DB::table('users')
            ->where('id', $id)
            ->update(['is_deactivated' => true]);
        return redirect('brgy_official/manageresident');
    }
    public function activate($id)
    {
        $isBlocked = DB::table('users')
            ->where('id', $id)
            ->update(['is_deactivated' => false]);
        return redirect('brgy_official/manageresident');
    }
}
