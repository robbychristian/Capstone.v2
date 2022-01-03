<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('disaster_reports')
                ->where('deleted_at', null)
                ->where('barangay', Auth::user()->brgy_loc)
                ->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . \URL::route('user.stats.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-search"></i></a>';
                    $btn = ' ' . $btn . '<a href="' . \URL::route('user.stats.edit', $row->id) . '"data-id="' . $row->id . '" class="btn btn-info btn-circle btn-sm" ><i class="fas fa-pen"></i></a>';
                    $btn = ' ' . $btn . '<a data-id="' . $row->id . '" class="btn btn-danger btn-circle btn-sm" id="deletebtn"><i class="fas fa-trash"></i></a>';
                    return $btn;
                })

                ->editColumn('created_at', function ($row) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('M d, Y');
                    return $formatedDate;
                })

                ->addColumn('type_disaster', function ($row) {
                    if ($row->type_disaster == 'Typhoon') {
                        return '<label class="badge badge-primary">Typhoon</label>';
                    } else if ($row->type_disaster == 'Flood') {
                        return '<label class="badge badge-info">Flood</label>';
                    } else if ($row->type_disaster == 'Low Pressure Area') {
                        return '<label class="badge badge-secondary">Low Pressure Area</label>';
                    } else if ($row->type_disaster == 'Earthquake') {
                        return '<label class="badge badge-warning">Earthquake</label>';
                    } else if ($row->type_disaster == 'Landslide') {
                        return '<label class="badge badge-danger">Landslide</label>';
                    } else if ($row->type_disaster == 'Others') {
                        return '<label class="badge badge-dark">Others</label>';
                    }
                })


                ->rawColumns(['action', 'type_disaster'])
                ->make(true);
        }
        return view('features.disasterstatsreports');
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
