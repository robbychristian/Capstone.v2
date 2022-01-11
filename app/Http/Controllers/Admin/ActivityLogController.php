<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('audits')
                ->join('users', 'audits.user_id', '=', 'users.id')
                ->select('audits.event', 'audits.created_at', 'users.id', 'users.email', 'users.first_name', 'users.last_name', 'users.user_role')
                ->where('audits.user_id', '!=', NULL)
                ->latest();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn = '<a href="#"data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                    return $btn;
                })

                ->addColumn('user', function ($row) {
                    return ' <div class= "name">
                    <h6>' . $row->first_name . '' . $row->last_name . '</h6>
                    <small class="text-muted">' . $row->user_email . '</small>
                    </div>';
                    
                })

                ->editColumn('created_at', function ($row) {
                    // $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('M d, Y \a\t h:i A');
                    $formatedDate = Carbon::parse($row->created_at)->diffForHumans();
                    return $formatedDate;
                })

                ->rawColumns(['action' , 'user'])
                ->make(true);
        }
        return view('features.activitylog');

        //$announcement = Announcement::first();
        //
        //// Get all associated Audits
        //$all = $announcement->audits;
        //
        //return $all;
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
        //
    }
}
