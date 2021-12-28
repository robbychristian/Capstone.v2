<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reports;
use Illuminate\Support\Facades\DB;
use DataTables;

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
                ->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                    return $btn;
                })


                ->addColumn('status', function ($row) {
                    if ($row->status == 'Report Confirmed') {
                        return '<label class="badge badge-success">Confirmed</label>';
                    } else if ($row->status == 'Report Pending') {
                        return '<label class="badge badge-warning">Pending</label>';
                    }else {
                        return '<label class="badge badge-danger">Not Confirmed</label>';
                    }
                    
                })

                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        //$reports = Reports::latest()->paginate(10);
        //return view('features.reports', [
        //    'reports' => $reports
        //]);
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
        return redirect('admin/reports');
    }

    public function confirmReport($id)
    {
        DB::table('reports')
            ->where('id', '=', $id)
            ->update(['status' => 'Report Confirmed']);
        return redirect('admin/reports');
    }

    public function pendingReport($id)
    {
        DB::table('reports')
            ->where('id', '=', $id)
            ->update(['status' => 'Report Pending']);
        return redirect('admin/reports');
    }
}
