<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reports;
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
        $reports = Reports::all();
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
        return redirect('user/reports');
    }

    public function fetchReport($id)
    {
        $reports = DB::table('reports')
            ->where('user_id', $id)
            ->get();
        return $reports;
    }

    public function sendReport($id, $fname, $mname, $lname, $title, $desc, $locLat, $locLen, $locImg) {
        $report = Reports::create([
            "user_id" => $id,
            'full_name' => $fname. ' ' . $mname . ' ' . $lname,
            'title' => $title,
            'description' => $desc,
            'status' => 'report pending',
            'loc_lat' => $locLat,
            'loc_lng' => $locLen,
            'loc_img' => 'no_image.jpg'
        ]);

            $file = $locImg;
            $file->store('reports', $id . '/' . $file, '');
            $report->update(['loc_img' => $file]);
        return true;
    }
}
