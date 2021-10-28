<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reports;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $request->file('image')->storeAs('report_imgs', $request->user_id . '/' . $request->loc_img, '');
        $report = new Reports;
        $report->user_id = $request->user_id;
        $report->full_name = $request->full_name;
        $report->title = $request->title;
        $report->description = $request->description;
        $report->status = $request->status;
        $report->loc_lat = $request->loc_lat;
        $report->loc_lng = $request->loc_lng;
        $report->loc_img = $request->loc_img;
        $result = $report->save();
        if ($result) {
            return ["Result" => "Saved"];
        } else {
            return ["Result" => "Failed"];
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

    //public function sendReport(Request $request)
    //{
    //    $request->file('image')->storeAs('report_imgs', $request->user_id . '/' . $request->loc_img, '');
    //    $report = new Reports;
    //    $report->user_id = $request->user_id;
    //    $report->full_name = $request->full_name;
    //    $report->title = $request->title;
    //    $report->description = $request->description;
    //    $report->status = $request->status;
    //    $report->loc_lat = $request->loc_lat;
    //    $report->loc_lng = $request->loc_lng;
    //    $report->loc_img = $request->loc_img;
    //    $result = $report->save();
    //    if ($result){
    //        return ["Result" => "Saved"];
    //    } else {
    //        return ["Result" => "Failed"];
    //    }
    //}

    public function uploadReport(Request $request)
    {
        //
    }

    public function submitReport(Request $request)
    {
        //$request->file('image')->storeAs('report_imgs', $request->user_id . '/' . $request->loc_img, '');
        //$report = new Reports;
        //$report->user_id = $request->input()->user_id;
        //$report->full_name = $request->input()->full_name;
        //$report->title = $request->input()->title;
        //$report->description = $request->input()->description;
        //$report->status = $request->input()->status;
        //$report->loc_lat = $request->input()->loc_lat;
        //$report->loc_lng = $request->input()->loc_lng;
        //$report->loc_img = $request->input()->loc_img;
        //$report = $report->save();
        return $request->json()->all();
    }
}
