<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EvacuationCenters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class LGUEvacuationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('evacuation_centers')
                ->where('deleted_at', null);
            return DataTables::of($data)
                ->addIndexColumn()
                
                ->addColumn('is_approved', function ($row) {
                    if ($row->is_approved == '1') {
                        return '<label class="badge badge-success">Approved</label>';
                    } else {
                        return '<label class="badge badge-danger">Not yet Approved</label>';
                    }
                })

                ->addColumn('availability', function ($row) {
                    if ($row->availability == 'Available') {
                        return '<label class="badge badge-success">Available</label>';
                    } else {
                        return '<label class="badge badge-danger">Not Available</label>';
                    }
                })
                ->rawColumns(['is_approved', 'availability'])
                ->make(true);
        }

        $barangays = DB::table('barangays')
            ->where('is_added', 1)
            ->get();
        $evacuationcenters = EvacuationCenters::where('deleted_at', null)->paginate(2);
        $evacmaps = EvacuationCenters::all()->where('deleted_at', null);
        return view('features.lguevacuationcenter', [
            'evacuationcenters' => $evacuationcenters,
            'barangays' => $barangays,
            'evacmaps' => $evacmaps,
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
        //
    }
}
