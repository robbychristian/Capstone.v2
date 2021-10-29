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
        //$postInput = file_get_contents('php://input');
        //$data = json_decode($postInput, true);
        //return ["user_id" => $data["user_id"] ];
        $response = [];
        $data = array();
        $image = array();
        $user_id = array();
        $full_name = array();
        $title = array();
        $desc = array();
        $stat = array();
        $loc_lat = array();
        $loc_lng = array();
        $loc_img = array();
        foreach($request->json()->all() as $item){
            array_push($data, $item);
        }
        foreach($data[0] as $item){
            array_push($image, $item);
        }
        foreach($data[1] as $item){
            array_push($user_id, $item);
        }
        foreach($data[2] as $item){
            array_push($full_name, $item);
        }
        foreach($data[3] as $item){
            array_push($title, $item);
        }
        foreach($data[4] as $item){
            array_push($desc, $item);
        }
        foreach($data[5] as $item){
            array_push($stat, $item);
        }
        foreach($data[6] as $item){
            array_push($loc_lat, $item);
        }
        foreach($data[7] as $item){
            array_push($loc_lng, $item);
        }
        foreach($data[8] as $item){
            array_push($loc_img, $item);
        }
        //$request->file($data[0])->storeAs('report_imgs', $request->user_id . '/' . $request->loc_img, '');
        //return $data[0];
        //return $request->json()->all();

        if ($request->hasFile('photo')){
            $request->file("photo")->storeAs('report_imgs', $request->user_id . '/' . $request->loc_img, '');
            return "done";
        } else {
            return "no";
        }
    }
    
    public function uploadImage(Request $request)
    {
        $img = $request->json()->all();
        if ($request->hasFile('photo')){
            $file = $request->file("photo")->storeAs('report_imgs', $request->user_id . '/' . $request->loc_img, '');
            $report = new Reports;
            $report->user_id = $request->user_id;
            $report->full_name = $request->full_name;
            $report->title = $request->title;
            $report->description = $request->description;
            $report->status = $request->status;
            $report->loc_lat = $request->loc_lat;
            $report->loc_lng = $request->loc_lng;
            $report->loc_img = $request->loc_img;
            $report = $report->save();
            return "saved";
        } else {
            return "no";
        }
    }
}
