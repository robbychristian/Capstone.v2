<?php

namespace App\Http\Controllers\Brgy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reports;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Reports::where('brgy_loc', '=', Auth::user()->brgy_loc)->latest()->paginate(10);
        return view('features.reports', [
            'reports' => $reports
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
        $report = Reports::find($id);
        $report->delete();
        return redirect('brgy_official/reports');
    }

    public function confirmReport($id)
    {
        DB::table('reports')
            ->where('id', '=', $id)
            ->update(['status' => 'Report Confirmed']);
        return redirect('brgy_official/reports');
    }

    public function pendingReport($id)
    {
        DB::table('reports')
            ->where('id', '=', $id)
            ->update(['status' => 'Report Pending']);
        return redirect('brgy_official/reports');
    }
}
