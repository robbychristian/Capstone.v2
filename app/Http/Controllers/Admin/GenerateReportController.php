<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DisasterExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $allBrgys = DB::table('barangays')
            ->where('is_added', 1)
            ->get();
        return view('features.generatereport', [
            'barangays' => $allBrgys
        ]);
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
        $validator = Validator::make($request->all(), [
            'monthOfdisaster' => 'required',
            'yearOfdisaster' => 'required',
            'barangay' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/generate')
                ->with('error', 'Please choose a month and year!')
                ->withErrors($validator);
        } else {
            $monthDisaster =  $request->input('monthOfdisaster');
            $yearDisaster = $request->input('yearOfdisaster');
            $barangay = $request->input('barangay');

            return Excel::download(new DisasterExport($monthDisaster, $yearDisaster, $barangay), 'Disaster Report.xlsx');
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
