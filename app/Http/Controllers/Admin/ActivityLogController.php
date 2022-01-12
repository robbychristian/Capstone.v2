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
                ->leftJoin('users', 'audits.user_id', '=', 'users.id')
                ->select('audits.id', 'audits.event', 'audits.created_at', 'audits.auditable_type', 'users.email', 'users.first_name', 'users.last_name', 'users.user_role')
                ->whereNull('audits.user_id')
                ->orWhere('audits.user_id', '!=', NULL)
                ->latest();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . \URL::route('admin.activitylog.show', $row->id)  . '"data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                    return $btn;
                })

                ->addColumn('user', function ($row) {

                    if($row->user_id == NULL){
                        return ' <div class= "name">
                        <h6>Admin</h6>
                        </div>';
                    }else{
                        return ' <div class= "name">
                        <h6>' . $row->first_name . ' ' . $row->last_name . '</h6>
                        <small class="text-muted">' . $row->email . '</small>
                        </div>';
                    }
                   

                   
                    
                })

                ->addColumn('user_type', function ($row) {
                    if ($row->user_role == '2') {
                        return '<label class="badge badge-primary">Resident</label>';
                    } else if ($row->user_role == '3') {
                        return '<label class="badge badge-info">Barangay Official</label>';
                    } else if ($row->user_role == '4') {
                        return '<label class="badge badge-secondary">Barangay Secretary</label>';
                    } else if ($row->user_role == '5') {
                        return '<label class="badge badge-warning">Barangay Co-Chairman</label>';
                    } else if ($row->user_role == '6') {
                        return '<label class="badge badge-success">Barangay Chairman</label>';
                    } else{
                        return '<label class="badge badge-dark">Administrator</label>';
                    }
                })

                ->editColumn('created_at', function ($row) {
                    $fulldate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('M d, Y \a\t h:i A');
                    //$formatedDate = Carbon::parse($row->created_at)->diffForHumans();
                    return $fulldate;
                })

                ->rawColumns(['action', 'user', 'user_type'])
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
        //$audits = DB::table('audits')
        //    ->where('id', $id)
        //    ->get();

        $audits = DB::table('audits')
            ->join('users', 'audits.user_id', '=', 'users.id')
            ->select('audits.*', 'users.*')
            ->where('audits.id', $id)
            ->get();

           

        return view('features.viewactivitylog', [
            'audits' => $audits,
        ]);

        //return var_dump($barangays);
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
