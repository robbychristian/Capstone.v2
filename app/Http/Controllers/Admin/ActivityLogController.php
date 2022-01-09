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
    public function index()
    {
        if ($request->ajax()) {
            $data = DB::table('audits')
                ->where('user_type', null)
                ->where('user_id', null)
                ->latest();
        
            return DataTables::of($data)
                ->addIndexColumn()
        
                ->addColumn('event', function ($row) {
                    if ($row->event == 'created') {
                        return '<label class="badge badge-success">Created</label>';
                    } else if ($row->event == 'updated') {
                        return '<label class="badge badge-info">Updated</label>';
                    } else if ($row->event == 'deleted') {
                        return '<label class="badge badge-danger">Deleted</label>';
                    }
                })
        
                ->addColumn('description', function ($row) {
                   if ($row->event == 'created') {
                       foreach ($row->new_values as $attribute => $value){
                          return "<b>$attribute = </b>$value<br>"; 
                       }
                   }
                })
        
        
                ->editColumn('created_at', function ($row) {
                    // $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('M d, Y \a\t h:i A');
                    $formatedDate = Carbon::parse($row->created_at)->diffForHumans();
                    return $formatedDate;
                })
        
                ->rawColumns(['action', 'event', 'description'])
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
