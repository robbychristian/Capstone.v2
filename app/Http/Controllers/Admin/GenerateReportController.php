<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DisasterExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class GenerateReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('features.generatereport');
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
        $validator = Validator::make(
            $request->all(),
            [
                'monthOfdisaster' => 'required',
                'yearOfdisaster' => 'required',
            ],
            $messages = [
                'monthOfdisaster' => 'The month of disaster field is required!',
                'yearOfdisaster' => 'The year of disaster field is required!',

            ]
        );

        if ($validator->fails()) {
            return redirect('/admin/generate')
                ->with('error', 'Please choose a month and year!')
                ->withErrors($validator)
                ->withInput();
        } else {
            $monthDisaster =  $request->input('monthOfdisaster');
            $yearDisaster = $request->input('yearOfdisaster');

            return Excel::download(new DisasterExport($monthDisaster, $yearDisaster), 'Disaster Report.xlsx');
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
}
