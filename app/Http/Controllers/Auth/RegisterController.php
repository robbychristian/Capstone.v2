<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;

use Illuminate\Http\data;
use Illuminate\Http\UploadedFile;
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
    //public function register(Request $request)
    //{
    //    $this->validator($request->all())->validate();

    //    event(new Registered($user = $this->create($request->all())));

    //    return $this->registered($request, $user)
    //        ?: redirect($this->redirectPath());
    //}

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/login';

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
     * Get a validator for an incoming registration data.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
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
            'cnum' => 'required|max:255|unique:user_profiles,contact_no',
            'pass' => 'required|min:8',
            'cpass' => 'required|min:8|same:pass',
            'file' => 'required|mimes:jpeg,png,jpg',
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
            'cnum.unique' => 'The contact number  has already been taken!',
            'pass.required' => 'The password field must not be empty!',
            'cpass.required' => 'The confirm password field must not be empty!',
            'cpass.same' => 'Confirm password should match password!',
            'file.required' => 'An image upload is required',
            'file.mimes' => 'The file must be a in a type of jpg, jpeg, png',
            'cbox.accepted' => 'Terms and conditions must be confirmed!',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //$validator = Validator::make($data, [
        //    'email' => 'required|unique:users|email',
        //    'fname' => 'required|max:255',
        //    'mname' => 'required|max:255',
        //    'lname' => 'required|max:255',
        //    'home_add' => 'required|max:255',
        //    'brgy' => 'required',
        //    'mbday' => 'required',
        //    'dbday' => 'required',
        //    'ybday' => 'required',
        //    'email' => 'required|email|unique:users|string',
        //    'cnum' => 'required|max:255',
        //    'pass' => 'required|min:8',
        //    'cpass' => 'required|min:8|same:pass',
        //    'cbox' => 'accepted'
        //], $messages = [
        //    'fname.required' => 'The first name field must not be empty!',
        //    'mname.required' => 'The middle name field must not be empty!',
        //    'lname.required' => 'The last name field must not be empty!',
        //    'brgy.required' => 'The Barangay field must not be empty!',
        //    'home_add.required' => 'The Home Address field must not be empty!',
        //    'mbday.required' => 'The month field must not be empty!',
        //    'dbday.required' => 'The day field must not be empty!',
        //    'ybday.required' => 'The year field must not be empty!',
        //    'email.required' => 'The email field must not be empty!',
        //    'cnum.required' => 'The contact number field must not be empty!',
        //    'pass.required' => 'The password field must not be empty!',
        //    'cpass.required' => 'The confirm password field must not be empty!',
        //    'cpass.same' => 'Confirm password should match password!',
        //    'cbox.accepted' => 'Terms and conditions must be confirmed!',
        //]);




        $user = User::create([
            'user_role' => 4,
            'email' => $data['email'],
            'first_name' => $data['fname'],
            'last_name' => $data['lname'],
            'email_verified_at' => NULL,
            'brgy_loc' => $data['brgy'],
            'is_blocked' => 0,
            'is_deactivated' => 0,
            'password' => Hash::make($data['pass']),
        ]);

        $user_profile = UserProfile::create([
            'user_email' => $data['email'],
            'middle_name' => $data['mname'],
            'home_add' => $data['home_add'],
            'contact_no' => $data['cnum'],
            'birth_day' => $data['mbday'] . '/' . $data['dbday'] . '/' . $data['ybday'],
            'profile_pic' => "noimage.jpg",
        ]);

        if (request()->hasFile('file')) {
            $file = request()->file('file')->getClientOriginalName();
            request()->file('file')->storeAs('profile_pics', $user->id . '/' . $file, '');
            $user_profile->update(['profile_pic' => $file]);
        }

        return $user;
    }
    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // Disabling the auto login on register
        $this->guard()->login($user);

        // return $this->registered($request, $user)
        //     ?: redirect($this->redirectPath());

        return view('auth.verify');
    }
}
