<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guidelines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class GuidelinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guideline = Guidelines::all();
        return view('features.guidelines', [
            'guidelines' => $guideline
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.createguidelines');
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
            'disaster' => 'required',
            'time' => 'required',
            'guideline' => 'required',
        ], $messages = [
            'disaster.required' => 'The disaster field is required!',
            'time.required' => 'The time field is required!',
            'guideline.required' => 'The guideline field is required!',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/guidelines/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $guideline = Guidelines::create([
                'admin_id' => 1,
                'issued_by' => Auth::user()->name,
                'disaster' => $request->input('disaster'),
                'time' => $request->input('time'),
                'guideline' => $request->input('guideline')
            ]);

            return redirect('/admin/guidelines')->with('success', 'Guideline has been posted!');
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
        $guidelines = Guidelines::find($id);
        return view('features.editguidelines', [
            'guidelines' => $guidelines
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
        $guidelines = Guidelines::find($id);
        $guidelines->delete();
        return redirect('/admin/guidelines')->with('success', 'The guidelines has been deleted!');
    }
}
