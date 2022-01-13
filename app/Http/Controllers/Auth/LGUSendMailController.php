<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LGUSendMailController extends Controller
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
        return view('features.sendmail');
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
            'email' => 'required',
            'subject' => 'required',
            'body' => 'required',
            'file' => 'required',
        ], $messages = [
            'email.required' => 'The email field is required!',
            'subject.required' => 'The subject field is required!',
            'body.required' => 'The body field is required!',
            'file.required' => 'The file field is required!',
        ]);

        if ($validator->fails()) {
            return redirect('/user/sendreport/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            if ($request->hasFile('file')) {
                $file = $request->file('file')->getClientOriginalName();
                $attachment = Attachments::create([
                    'user_id' => Auth::user()->id,
                    'email' => $request->input('email'),
                    'subject' => $request->input('subject'),
                    'body' => $request->input('body'),
                    'file' => $request->input('file'),
                ]);
                $request->file('file')->storeAs('attachments', Auth::user()->id . '/' . $file, '');
                return redirect('/user/sendreport')->with('success', 'Attachment successfully added!');
            }
        }

        //$path = public_path('storage');

        //return $path;

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
