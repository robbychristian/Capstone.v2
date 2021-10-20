<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|email',
            'fname' => 'required|max:255',
            'mname' => 'required|max:255',
            'lname' => 'required|max:255',
            'home_add' => 'required|max:255',
            'brgy' => 'required',
            'mbday' => 'required',
            'dbday' => 'required',
            'ybday' => 'required',
            'email' => 'required|email|unique:users|string',
            'cnum' => 'required|max:255',
            'pass' => 'required|min:8',
            'cpass' => 'required|min:8|same:pass',
            'cbox' => 'accepted'
        ], $messages = [
            'fname.required' => 'The first name field must not be empty!',
            'mname.required' => 'The middle name field must not be empty!',
            'lname.required' => 'The last name field must not be empty!',
            'brgy.required' => 'The Barangay field must not be empty!',
            'home_add.required' => 'The Home Address field must not be empty!',
            'mbday.required' => 'The month field must not be empty!',
            'dbday.required' => 'The day field must not be empty!',
            'ybday.required' => 'The year field must not be empty!',
            'email.required' => 'The email field must not be empty!',
            'cnum.required' => 'The contact number field must not be empty!',
            'pass.required' => 'The new password field must not be empty!',
            'cpass.required' => 'The confirm password field must not be empty!',
            'cpass.same' => 'Confirm password should match new password!',
            'cbox.accepted' => 'Terms and conditions must be confirmed!',
        ]);

        if ($validator->fails()) {
            return redirect('/user/register/')
                ->withErrors($validator)
                ->withInput();
        } else {

            $user = User::create([
                'user_role' => 4,
                'email' => $request['email'],
                'first_name' => $request['fname'],
                'last_name' => $request['lname'],
                'brgy_loc' => $request['brgy'],
                'is_blocked' => 0,
                'is_deactivated' => 0,
                'password' => Hash::make($request['password']),
            ]);

            $user_profile = UserProfile::create([
                'user_email' => $request['email'],
                'middle_name' => $request['mname'],
                'home_add' => $request['home_add'],
                'contact_no' => $request['cnum'],
                'birth_day' => $request['mbday'] . '/' . $request['dbday'] . '/' . $request['ybday'],
                'profile_pic' => 'noimage.jpg'
            ]);

            return redirect()->route('/email/verify');
        }
    }
}
