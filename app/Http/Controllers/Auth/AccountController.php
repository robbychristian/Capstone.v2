<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;

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
        $user = User::find($id);
        $profile = UserProfile::find($id);
        return view('features.account', [
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
        $validator = Validator::make($request->all(), [
            'fname' => 'required|max:255',
            'mname' => 'required|max:255',
            'lname' => 'required|max:255',
            'cnum' => 'required|max:255',
            'file' => 'required|mimes:jpeg,png,jpg',
            'curr_pass' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Old Password didn\'t match!');
                    }
                },
            ],
            'new_pass' => 'required|min:8',
            'conf_pass' => 'required|min:8|same:new_pass'
        ], $messages = [
            'email.required' => 'The email field must not be empty!',
            'fname.required' => 'The first name field must not be empty!',
            'mname.required' => 'The middle name field must not be empty!',
            'lname.required' => 'The last name field must not be empty!',
            'cnum.required' => 'The contact number field must not be empty!',
            'curr_pass.required' => 'The current password field must not be empty!',
            'new_pass.required' => 'The new password field must not be empty!',
            'conf_pass.required' => 'The confirm password field must not be empty!',
            'conf_pass.same' => 'Confirm password should match new password!',
        ]);

        //if(Auth::attempt(['email' => Auth::user()->email,'password' => $request->input('curr_pass')])) {
        //    return back()->withErrors($validator, [
        //        'curr_pass' => 'Password given does not match the credentials'
        //    ]);
        //}

        if ($validator->fails()) {
            return redirect('/user/account/' . Auth::user()->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            if ($request->hasFile('file')) {
                $file = $request->file('file')->getClientOriginalName();
                $request->file('file')->storeAs('profile_pics', Auth::user()->id . '/' . $file, '');
                $user = User::where('id', $id)->update([
                    'first_name' => $request->input('fname'),
                    'last_name' => $request->input('lname'),
                    'password' => Hash::make($request->input('new_pass'))
                ]);
                $profile = UserProfile::where('id', $id)->update([
                    'middle_name' => $request->input('mname'),
                    'contact_no' => $request->input('cnum'),
                    'profile_pic' => $file,
                ]);
            }


            return redirect('/user/account/' . Auth::user()->id . '/edit')->with('success', 'Your account has been successfully updated!');
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

    public function creds(Request $request)
    {
        $dbPass = User::where('email', $request->email)->value('password');

        if (User::where('email', '=', $request->email)->exists()) {
            if (Hash::check($request->pass, $dbPass)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function fetchCreds($email)
    {
        $userCreds = DB::table('users')
            ->join('user_profiles', 'users.email', '=', 'user_profiles.user_email')
            ->select('users.*', 'user_profiles.*')
            ->where('users.email', $email)
            ->where('user_profiles.user_email', $email)
            ->get();

        return $userCreds;
    }

    public function editProfile(Request $request)
    {
        if ($request->hasFile('photo')) {
            $fileName = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('profile_pics', $request->id . '/' . $fileName, '');
            DB::table('users')
                ->where('id', $request->id)
                ->update([
                    'first_name' => $request->fname,
                    'last_name' => $request->lname,
                    'password' => Hash::make($request->pass)
                ]);
            DB::table('user_profiles')
                ->where('id', $request->id)
                ->update([
                    'middle_name' => $request->mname,
                    'contact_no' => $request->contactNo,
                    'home_add' => $request->homeAdd,
                    'profile_pic' => $fileName
                ]);
            return "hahha";
        } else {
            return "hhuhuhuuh";
        }
    }

    public function checkPass(Request $request)
    {
        $user_pass = DB::table('users')
            ->where('id', '=', $request->id)
            ->pluck('password');
        $pass = $request->pass;
        if (Hash::check($pass, $user_pass[0])) {
            return true;
        } else {
            return false;
        }
    }
}
