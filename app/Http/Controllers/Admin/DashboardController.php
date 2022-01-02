<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DisasterReport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use DataTables;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBrgys = DB::table('barangays')
            ->where('is_added', 1)
            ->get();

        return view('features.admindashboardindex',[
            'barangays' => $allBrgys
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

    public function brgyDashboard($brgy, Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('disaster_reports')
                ->where('deleted_at', null)
                ->where('barangay', '=', $brgy)
                ->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . \URL::route('admin.stats.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-search"></i></a>';
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


        
        
        // ADD WHERE CLAUSE IN BRGY
        $date = Carbon::now()->format('Y');
        $brgy_loc = $brgy;
        //january
        $jan_typhoon_count = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jan_flood_count = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jan_lpa_count = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jan_earthquake_count = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jan_landslide_count = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jan_others_count = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');

        //February
        $feb_typhoon_count = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $feb_flood_count = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $feb_lpa_count = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $feb_earthquake_count = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $feb_landslide_count = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $feb_others_count = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');

        //March
        $mar_typhoon_count = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $mar_flood_count = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $mar_lpa_count = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $mar_earthquake_count = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $mar_landslide_count = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $mar_others_count = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');


        //April
        $apr_typhoon_count = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $apr_flood_count = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $apr_lpa_count = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $apr_earthquake_count = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $apr_landslide_count = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $apr_others_count = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');


        //May
        $may_typhoon_count = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $may_flood_count = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $may_lpa_count = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $may_earthquake_count = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $may_landslide_count = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $may_others_count = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');

        //June
        $jun_typhoon_count = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jun_flood_count = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jun_lpa_count = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jun_earthquake_count = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jun_landslide_count = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jun_others_count = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');


        //July
        $jul_typhoon_count = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jul_flood_count = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jul_lpa_count = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jul_earthquake_count = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jul_landslide_count = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $jul_others_count = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');



        //August
        $aug_typhoon_count = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $aug_flood_count = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $aug_lpa_count = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $aug_earthquake_count = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $aug_landslide_count = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $aug_others_count = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');


        //September
        $sept_typhoon_count = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $sept_flood_count = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $sept_lpa_count = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $sept_earthquake_count = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $sept_landslide_count = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $sept_others_count = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');


        //oct
        $oct_typhoon_count = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $oct_flood_count = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $oct_lpa_count = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $oct_earthquake_count = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $oct_landslide_count = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $oct_others_count = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');


        //November
        $nov_typhoon_count = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $nov_flood_count = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $nov_lpa_count = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $nov_earthquake_count = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $nov_landslide_count = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $nov_others_count = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');


        //December
        $dec_typhoon_count = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $dec_flood_count = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $dec_lpa_count = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $dec_earthquake_count = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $dec_landslide_count = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');
        $dec_others_count = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('families_affected');


        /* INDIVIDUALS AFFECTED */

        //january
        $jan_typhoon_count_indiv = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jan_flood_count_indiv = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jan_lpa_count_indiv = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jan_earthquake_count_indiv = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jan_landslide_count_indiv = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jan_others_count_indiv = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');


        //February
        $feb_typhoon_count_indiv = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $feb_flood_count_indiv = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $feb_lpa_count_indiv = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $feb_earthquake_count_indiv = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $feb_landslide_count_indiv = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $feb_others_count_indiv = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');

        //March
        $mar_typhoon_count_indiv = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $mar_flood_count_indiv = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $mar_lpa_count_indiv = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $mar_earthquake_count_indiv = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $mar_landslide_count_indiv = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $mar_others_count_indiv = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');



        //April
        $apr_typhoon_count_indiv = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $apr_flood_count_indiv = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $apr_lpa_count_indiv = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $apr_earthquake_count_indiv = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $apr_landslide_count_indiv = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $apr_others_count_indiv = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');

        //May
        $may_typhoon_count_indiv = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $may_flood_count_indiv = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $may_lpa_count_indiv = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $may_earthquake_count_indiv = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $may_landslide_count_indiv = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $may_others_count_indiv = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');


        //June
        $jun_typhoon_count_indiv = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jun_flood_count_indiv = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jun_lpa_count_indiv = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jun_earthquake_count_indiv = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jun_landslide_count_indiv = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jun_others_count_indiv = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');


        //July
        $jul_typhoon_count_indiv = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jul_flood_count_indiv = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jul_lpa_count_indiv = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jul_earthquake_count_indiv = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jul_landslide_count_indiv = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $jul_others_count_indiv = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');



        //August
        $aug_typhoon_count_indiv = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $aug_flood_count_indiv = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $aug_lpa_count_indiv = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $aug_earthquake_count_indiv = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $aug_landslide_count_indiv = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $aug_others_count_indiv = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');


        //September
        $sept_typhoon_count_indiv = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $sept_flood_count_indiv = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $sept_lpa_count_indiv = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $sept_earthquake_count_indiv = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $sept_landslide_count_indiv = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $sept_others_count_indiv = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');


        //oct
        $oct_typhoon_count_indiv = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $oct_flood_count_indiv = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $oct_lpa_count_indiv = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $oct_earthquake_count_indiv = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $oct_landslide_count_indiv = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $oct_others_count_indiv = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');


        //November
        $nov_typhoon_count_indiv = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $nov_flood_count_indiv = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $nov_lpa_count_indiv = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $nov_earthquake_count_indiv = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $nov_landslide_count_indiv = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $nov_others_count_indiv = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');


        //December
        $dec_typhoon_count_indiv = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $dec_flood_count_indiv = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $dec_lpa_count_indiv = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $dec_earthquake_count_indiv = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $dec_landslide_count_indiv = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');
        $dec_others_count_indiv = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('individuals_affected');


        /* EVACUEES AFFECTED */

        //january
        $jan_typhoon_count_evac = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jan_flood_count_evac = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jan_lpa_count_evac = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jan_earthquake_count_evac = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jan_landslide_count_evac = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jan_others_count_evac = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'January')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');


        //February
        $feb_typhoon_count_evac = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $feb_flood_count_evac = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $feb_lpa_count_evac = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $feb_earthquake_count_evac = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $feb_landslide_count_evac = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $feb_others_count_evac = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'February')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');


        //March
        $mar_typhoon_count_evac = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $mar_flood_count_evac = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $mar_lpa_count_evac = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $mar_earthquake_count_evac = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $mar_landslide_count_evac = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $mar_others_count_evac = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'March')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');



        //April
        $apr_typhoon_count_evac = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $apr_flood_count_evac = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $apr_lpa_count_evac = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $apr_earthquake_count_evac = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $apr_landslide_count_evac = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $apr_others_count_evac = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'April')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');


        //May
        $may_typhoon_count_evac = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $may_flood_count_evac = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $may_lpa_count_evac = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $may_earthquake_count_evac = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $may_landslide_count_evac = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $may_others_count_evac = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'May')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');


        //June
        $jun_typhoon_count_evac = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jun_flood_count_evac = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jun_lpa_count_evac = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jun_earthquake_count_evac = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jun_landslide_count_evac = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jun_others_count_evac = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'June')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');


        //July
        $jul_typhoon_count_evac = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jul_flood_count_evac = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jul_lpa_count_evac = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jul_earthquake_count_evac = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jul_landslide_count_evac = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $jul_others_count_evac = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'July')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');



        //August
        $aug_typhoon_count_evac = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $aug_flood_count_evac = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $aug_lpa_count_evac = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $aug_earthquake_count_evac = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $aug_landslide_count_evac = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $aug_others_count_evac = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'August')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');


        //September
        $sept_typhoon_count_evac = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $sept_flood_count_evac = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $sept_lpa_count_evac = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $sept_earthquake_count_evac = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $sept_landslide_count_evac = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $sept_others_count_evac = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'September')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');


        //oct
        $oct_typhoon_count_evac = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $oct_flood_count_evac = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $oct_lpa_count_evac = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $oct_earthquake_count_evac = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $oct_landslide_count_evac = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $oct_others_count_evac = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'October')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');


        //November
        $nov_typhoon_count_evac = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $nov_flood_count_evac = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $nov_lpa_count_evac = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $nov_earthquake_count_evac = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $nov_landslide_count_evac = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $nov_others_count_evac = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'November')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');


        //December
        $dec_typhoon_count_evac = DisasterReport::where('type_disaster', 'Typhoon')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $dec_flood_count_evac = DisasterReport::where('type_disaster', 'Flood')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $dec_lpa_count_evac = DisasterReport::where('type_disaster', 'Low Pressure Area')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $dec_earthquake_count_evac = DisasterReport::where('type_disaster', 'Earthquake')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $dec_landslide_count_evac = DisasterReport::where('type_disaster', 'Landslide')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');
        $dec_others_count_evac = DisasterReport::where('type_disaster', 'Others')
            ->where('month_disaster', 'December')
            ->where('year_disaster', $date)
            ->where('barangay', $brgy_loc)
            ->sum('evacuees');


        return view('features.dashboard', compact(
            'jan_typhoon_count',
            'jan_flood_count',
            'jan_lpa_count',
            'jan_earthquake_count',
            'jan_landslide_count',
            'jan_others_count',


            'feb_typhoon_count',
            'feb_flood_count',
            'feb_lpa_count',
            'feb_earthquake_count',
            'feb_landslide_count',
            'feb_others_count',


            'mar_typhoon_count',
            'mar_flood_count',
            'mar_lpa_count',
            'mar_earthquake_count',
            'mar_landslide_count',
            'mar_others_count',


            'apr_typhoon_count',
            'apr_flood_count',
            'apr_lpa_count',
            'apr_earthquake_count',
            'apr_landslide_count',
            'apr_others_count',


            'may_typhoon_count',
            'may_flood_count',
            'may_lpa_count',
            'may_earthquake_count',
            'may_landslide_count',
            'may_others_count',


            'jun_typhoon_count',
            'jun_flood_count',
            'jun_lpa_count',
            'jun_earthquake_count',
            'jun_landslide_count',
            'jun_others_count',


            'jul_typhoon_count',
            'jul_flood_count',
            'jul_lpa_count',
            'jul_earthquake_count',
            'jul_landslide_count',
            'jul_others_count',


            'aug_typhoon_count',
            'aug_flood_count',
            'aug_lpa_count',
            'aug_earthquake_count',
            'aug_landslide_count',
            'aug_others_count',


            'sept_typhoon_count',
            'sept_flood_count',
            'sept_lpa_count',
            'sept_earthquake_count',
            'sept_landslide_count',
            'sept_others_count',


            'oct_typhoon_count',
            'oct_flood_count',
            'oct_lpa_count',
            'oct_earthquake_count',
            'oct_landslide_count',
            'oct_others_count',

            'nov_typhoon_count',
            'nov_flood_count',
            'nov_lpa_count',
            'nov_earthquake_count',
            'nov_landslide_count',
            'nov_others_count',

            'dec_typhoon_count',
            'dec_flood_count',
            'dec_lpa_count',
            'dec_earthquake_count',
            'dec_landslide_count',
            'dec_others_count',


            'jan_typhoon_count_indiv',
            'jan_flood_count_indiv',
            'jan_lpa_count_indiv',
            'jan_earthquake_count_indiv',
            'jan_landslide_count_indiv',
            'jan_others_count_indiv',


            'feb_typhoon_count_indiv',
            'feb_flood_count_indiv',
            'feb_lpa_count_indiv',
            'feb_earthquake_count_indiv',
            'feb_landslide_count_indiv',
            'feb_others_count_indiv',

            'mar_typhoon_count_indiv',
            'mar_flood_count_indiv',
            'mar_lpa_count_indiv',
            'mar_earthquake_count_indiv',
            'mar_landslide_count_indiv',
            'mar_others_count_indiv',


            'apr_typhoon_count_indiv',
            'apr_flood_count_indiv',
            'apr_lpa_count_indiv',
            'apr_earthquake_count_indiv',
            'apr_landslide_count_indiv',
            'apr_others_count_indiv',

            'may_typhoon_count_indiv',
            'may_flood_count_indiv',
            'may_lpa_count_indiv',
            'may_earthquake_count_indiv',
            'may_landslide_count_indiv',
            'may_others_count_indiv',


            'jun_typhoon_count_indiv',
            'jun_flood_count_indiv',
            'jun_lpa_count_indiv',
            'jun_earthquake_count_indiv',
            'jun_landslide_count_indiv',
            'jun_others_count_indiv',

            'jul_typhoon_count_indiv',
            'jul_flood_count_indiv',
            'jul_lpa_count_indiv',
            'jul_earthquake_count_indiv',
            'jul_landslide_count_indiv',
            'jul_others_count_indiv',


            'aug_typhoon_count_indiv',
            'aug_flood_count_indiv',
            'aug_lpa_count_indiv',
            'aug_earthquake_count_indiv',
            'aug_landslide_count_indiv',
            'aug_others_count_indiv',


            'sept_typhoon_count_indiv',
            'sept_flood_count_indiv',
            'sept_lpa_count_indiv',
            'sept_earthquake_count_indiv',
            'sept_landslide_count_indiv',
            'sept_others_count_indiv',


            'oct_typhoon_count_indiv',
            'oct_flood_count_indiv',
            'oct_lpa_count_indiv',
            'oct_earthquake_count_indiv',
            'oct_landslide_count_indiv',
            'oct_others_count_indiv',


            'nov_typhoon_count_indiv',
            'nov_flood_count_indiv',
            'nov_lpa_count_indiv',
            'nov_earthquake_count_indiv',
            'nov_landslide_count_indiv',
            'nov_others_count_indiv',


            'dec_typhoon_count_indiv',
            'dec_flood_count_indiv',
            'dec_lpa_count_indiv',
            'dec_earthquake_count_indiv',
            'dec_landslide_count_indiv',
            'dec_others_count_indiv',


            'jan_typhoon_count_evac',
            'jan_flood_count_evac',
            'jan_lpa_count_evac',
            'jan_earthquake_count_evac',
            'jan_landslide_count_evac',
            'jan_others_count_evac',


            'feb_typhoon_count_evac',
            'feb_flood_count_evac',
            'feb_lpa_count_evac',
            'feb_earthquake_count_evac',
            'feb_landslide_count_evac',
            'feb_others_count_evac',


            'mar_typhoon_count_evac',
            'mar_flood_count_evac',
            'mar_lpa_count_evac',
            'mar_earthquake_count_evac',
            'mar_landslide_count_evac',
            'mar_others_count_evac',


            'apr_typhoon_count_evac',
            'apr_flood_count_evac',
            'apr_lpa_count_evac',
            'apr_earthquake_count_evac',
            'apr_landslide_count_evac',
            'apr_others_count_evac',


            'may_typhoon_count_evac',
            'may_flood_count_evac',
            'may_lpa_count_evac',
            'may_earthquake_count_evac',
            'may_landslide_count_evac',
            'may_others_count_evac',


            'jun_typhoon_count_evac',
            'jun_flood_count_evac',
            'jun_lpa_count_evac',
            'jun_earthquake_count_evac',
            'jun_landslide_count_evac',
            'jun_others_count_evac',


            'jul_typhoon_count_evac',
            'jul_flood_count_evac',
            'jul_lpa_count_evac',
            'jul_earthquake_count_evac',
            'jul_landslide_count_evac',
            'jul_others_count_evac',

            'aug_typhoon_count_evac',
            'aug_flood_count_evac',
            'aug_lpa_count_evac',
            'aug_earthquake_count_evac',
            'aug_landslide_count_evac',
            'aug_others_count_evac',


            'sept_typhoon_count_evac',
            'sept_flood_count_evac',
            'sept_lpa_count_evac',
            'sept_earthquake_count_evac',
            'sept_landslide_count_evac',
            'sept_others_count_evac',


            'oct_typhoon_count_evac',
            'oct_flood_count_evac',
            'oct_lpa_count_evac',
            'oct_earthquake_count_evac',
            'oct_landslide_count_evac',
            'oct_others_count_evac',


            'nov_typhoon_count_evac',
            'nov_flood_count_evac',
            'nov_lpa_count_evac',
            'nov_earthquake_count_evac',
            'nov_landslide_count_evac',
            'nov_others_count_evac',


            'dec_typhoon_count_evac',
            'dec_flood_count_evac',
            'dec_lpa_count_evac',
            'dec_earthquake_count_evac',
            'dec_landslide_count_evac',
            'dec_others_count_evac',


        ));
    }
}
