<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reports;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Carbon\Carbon;
use Facade\FlareClient\Report;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('reports')
                ->where('deleted_at', null)
                ->where('brgy_loc', Auth::user()->brgy_loc)
                ->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . \URL::route('user.reports.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                    return $btn;
                })


                ->addColumn('status', function ($row) {
                    if ($row->status == 'Report Confirmed') {
                        return '<label class="badge badge-success">Confirmed</label>';
                    } else if ($row->status == 'Report Pending') {
                        return '<label class="badge badge-warning">Pending</label>';
                    } else {
                        return '<label class="badge badge-danger">Not Confirmed</label>';
                    }
                })

                ->editColumn('created_at', function ($row) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('M d, Y \a\t h:i A');
                    return $formatedDate;
                })

                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('features.reports');
    }


    public function getreports(Request $request, $userid)
    {
        if ($request->ajax()) {
            $data = DB::table('reports')
                ->where('deleted_at', null)
                ->where('user_id', $userid)
                ->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . \URL::route('user.reports.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                    return $btn;
                })


                ->addColumn('status', function ($row) {
                    if ($row->status == 'Report Confirmed') {
                        return '<label class="badge badge-success">Confirmed</label>';
                    } else if ($row->status == 'Report Pending') {
                        return '<label class="badge badge-warning">Pending</label>';
                    } else {
                        return '<label class="badge badge-danger">Not Confirmed</label>';
                    }
                })

                ->editColumn('created_at', function ($row) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('M d, Y \a\t h:i A');
                    return $formatedDate;
                })

                ->rawColumns(['action', 'status'])
                ->make(true);
        }


        return view('features.reports');
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
        $report = Reports::find($id);
        return view('features.viewreports', [
            'report' => $report
        ]);
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
        return redirect('user/reports')->with('success', 'Report successfully deleted!');
    }

    public function confirmReport($id)
    {
        //DB::table('reports')
        //    ->where('id', '=', $id)
        //    ->update(['status' => 'Report Confirmed']);
        $report = Reports::find($id);
        $report->status = 'Report Confirmed';
        $report->save();
        return redirect('user/reports')->with('success', 'Report successfully confirmed!');
    }

    public function pendingReport($id)
    {
        //DB::table('reports')
        //    ->where('id', '=', $id)
        //    ->update(['status' => 'Report Pending']);
        $report = Reports::find($id);
        $report->status = 'Report Pending';
        $report->save();
        return redirect('user/reports')->with('success', 'The submitted report is pending!');
    }

    public function fetchReport($id, $brgy)
    {
        $reports = DB::table('reports')
            ->where('user_id', $id)
            ->where('brgy_loc', $brgy)
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
        foreach ($request->json()->all() as $item) {
            array_push($data, $item);
        }
        foreach ($data[0] as $item) {
            array_push($image, $item);
        }
        foreach ($data[1] as $item) {
            array_push($user_id, $item);
        }
        foreach ($data[2] as $item) {
            array_push($full_name, $item);
        }
        foreach ($data[3] as $item) {
            array_push($title, $item);
        }
        foreach ($data[4] as $item) {
            array_push($desc, $item);
        }
        foreach ($data[5] as $item) {
            array_push($stat, $item);
        }
        foreach ($data[6] as $item) {
            array_push($loc_lat, $item);
        }
        foreach ($data[7] as $item) {
            array_push($loc_lng, $item);
        }
        foreach ($data[8] as $item) {
            array_push($loc_img, $item);
        }
        //$request->file($data[0])->storeAs('report_imgs', $request->user_id . '/' . $request->loc_img, '');
        //return $data[0];
        //return $request->json()->all();

        if ($request->hasFile('photo')) {
            $request->file("photo")->storeAs('report_imgs', $request->user_id . '/' . $request->loc_img, '');
            return "done";
        } else {
            return "no";
        }
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file("photo")->storeAs('report_imgs', $request->user_id . '/' . $request->loc_img, '');
            $report = new Reports;
            $report->user_id = $request->user_id;
            $report->full_name = $request->full_name;
            $report->title = $request->title;
            $report->description = $request->description;
            $report->brgy_loc = $request->brgy_loc;
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

    public function deleteReport($id)
    {
        $report = Reports::find($id);
        $report->delete();
    }
}
