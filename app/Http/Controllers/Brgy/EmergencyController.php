<?php

namespace App\Http\Controllers\Brgy;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class EmergencyController extends Controller
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
        $brgyloc = Auth::user()->brgy_loc;
        $numbers = DB::table('user_profiles')
            ->join('users', 'user_profiles.user_email', 'users.email')
            ->where('brgy_loc', $brgyloc)
            ->get('contact_no');

        return view('features.emergencymessage', [
            'numbers' => $numbers
        ]);
    }

    function itexmo($number, $message, $apicode, $passwd)
    {
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
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
            //'recipients' => 'required',
            'message' => 'required',
        ], $messages = [
            //'recipients.required' => 'The recipients is required!',
            'message.required' => 'The body field is required!',
        ]);

        $allNumbers = DB::table('user_profiles')
            ->pluck('contact_no');
        foreach ($allNumbers as $number) {
            $message = $request->input('message');
            $apicode = "TR-QUADC054756_QWFEJ";
            $apipwd = "w}5266@ikb";

            $brgyloc = Auth::user()->brgy_loc;
            $numbers = DB::table('user_profiles')
                ->join('users', 'user_profiles.user_email', 'users.email')
                ->where('brgy_loc', $brgyloc)
                ->get('contact_no');
            $final_message = $message . "\n" . "This message is sent through kabisigapp.com. Stay safe!";


            if ($validator->fails()) {
                return redirect('/user/emergencymessage/create')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $result = $this->itexmo($number, $message, $apicode, $apipwd);
                if ($result == "") {
                    return redirect('/user/emergencymessage/create')->with('success', 'Something went wrong!');
                } else if ($result == 0) {
                    return redirect('/user/emergencymessage/create')->with('success', 'Message sent!');
                } else {
                    return redirect('/user/emergencymessage/create')->with('error', 'Error was encountered!');
                }
            }
        }
        //else{
        //    //foreach ($numbers as $number) {
        //    //    $result = $this->itexmo($number, $message, $apicode, $apipwd);
        //    //    if ($result == "") {
        //    //        return redirect('/brgy_official/emergencymessage/create')->with('success', 'Something went wrong!');
        //    //    } else if ($result == 0) {
        //    //        return redirect('/brgy_official/emergencymessage/create')->with('success', 'Message sent!');
        //    //    } else {
        //    //        return redirect('/brgy_official/emergencymessage/create')->with('success', 'Error was encountered!');
        //    //    }
        //    //}
        //}
        //} else {
        //    $result = $this->itexmo($number, $message, $apicode, $apipwd);
        //    if($result == ""){
        //        return redirect('/brgy_official/emergencymessage/create')->with('success', 'Something went wrong!');	
        //    }else if ($result == 0){
        //        return redirect('/brgy_official/emergencymessage/create')->with('success', 'Message sent!');
        //    }else{
        //        return redirect('/brgy_official/emergencymessage/create')->with('success', 'Error was encountered!');
        //    }
        //    
        //}
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
}
