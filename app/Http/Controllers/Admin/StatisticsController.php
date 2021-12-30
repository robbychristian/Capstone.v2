<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DisasterAffectedStreets;
use App\Models\DisasterReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$disasterstats = DisasterReport::latest()->paginate(10);

        if ($request->ajax()) {
            $data = DB::table('disaster_reports')
                ->where('deleted_at', null)
                ->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . \URL::route('admin.stats.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-search"></i></a>';
                    $btn = ' ' . $btn . '<a href="' . \URL::route('admin.stats.edit', $row->id) . '"data-id="' . $row->id . '" class="btn btn-info btn-circle btn-sm" ><i class="fas fa-pen"></i></a>';
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
        $allBrgys = DB::table('barangays')
            ->where('is_added', 1)
            ->get();
        return view('features.createdisasterstatsreport', [
            'barangays' => $allBrgys
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'typeOfdisaster' => 'required',
            'monthOfdisaster' => 'required',
            'dayOfdisaster' => 'required',
            'yearOfdisaster' => 'required|max:2100|integer',
            'barangay' => 'required',
            'familiesAffected' => 'required|integer',
            'individualsAffected' => 'required|integer',
            'evacuees' => 'required|integer',
            'addMoreInputFields.*.street' => 'required',
            'addMoreInputFields.*.families' => 'required|integer',
        ], $messages = [
            'typeOfdisaster.required' => 'The type of disaster field is required!',
            'monthOfdisaster.required' => 'The month of disaster field is required!',
            'dayOfdisaster.required' => 'The day of disaster field is required!',
            'dayOfdisaster.integer' => 'The day of disaster must be an integer.',
            'yearOfdisaster.required' => 'The year of disaster field is required!',
            'yearOfdisaster.max' => 'Enter a valid year!',
            'barangay.required' => 'The barangay field is required!',
            'familiesAffected.required' => 'The families affected field is required!',
            'familiesAffected.integer' => 'Enter a valid number!',
            'individualsAffected.required' => 'The individuals affected field is required!',
            'individualsAffected.integer' => 'Enter a valid number!',
            'evacuees.required' => 'The evacuees field is required!',
            'evacuees.integer' => 'Enter a valid number!',
            'addMoreInputFields.*.street.required' => 'The street field is required!',
            'addMoreInputFields.*.families.required' => 'The number of families field is required!',
            'addMoreInputFields.*.families.integer' => 'Enter a valid number!',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/stats/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            DisasterReport::create([
                'type_disaster' => $request->input('typeOfdisaster'),
                'name_disaster' => $request->input('nameOfdisaster'),
                'month_disaster' => $request->input('monthOfdisaster'),
                'day_disaster' =>  $request->input('dayOfdisaster'),
                'year_disaster' => $request->input('yearOfdisaster'),
                'barangay' => $request->input('barangay'),
                'families_affected' => $request->input('familiesAffected'),
                'individuals_affected' => $request->input('individualsAffected'),
                'evacuees' => $request->input('evacuees')
            ]);

            $id = DB::table('disaster_reports')
                ->where('month_disaster', $request->input('monthOfdisaster'))
                ->where('day_disaster', $request->input('dayOfdisaster'))
                ->where('year_disaster', $request->input('yearOfdisaster'))->value('id');

            foreach ($request->addMoreInputFields as $key => $values) {

                DB::table('disaster_affected_streets')->insert([
                    'disaster_id' => $id,
                    'affected_streets' => $values['street'],
                    'number_families_affected' => $values['families'],
                ]);
            };


            return redirect('/admin/stats/create')
                ->with('success', 'Disaster Report Saved!');
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
        $disasterstats = DisasterReport::find($id);
        $affectedstreets = DB::table('disaster_reports')
            ->join('disaster_affected_streets', 'disaster_reports.id', '=', 'disaster_affected_streets.disaster_id')
            ->select('disaster_reports.*', 'disaster_affected_streets.*')
            ->where('disaster_reports.id', $id)
            ->get();


        return view('features.viewdisasterstatsreport', [
            'disasterstats' => $disasterstats,
            'affectedstreets' => $affectedstreets

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
        $disasterstats = DisasterReport::find($id);
        $affectedstreets = DisasterReport::find($id)->affectedStreets;
        $allBrgys = DB::table('barangays')
            ->where('is_added', 1)
            ->get();

        //return $affectedstreets;
        return view('features.editdisasterstatsreports', [
            'disasterstats' => $disasterstats,
            'affectedstreets' => $affectedstreets,
            'barangays' => $allBrgys

        ]);
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
        $validator = Validator::make($request->all(), [
            'typeOfdisaster' => 'required',
            'monthOfdisaster' => 'required',
            'dayOfdisaster' => 'required',
            'yearOfdisaster' => 'required|max:2100|integer',
            'barangay' => 'required',
            'familiesAffected' => 'required|integer',
            'individualsAffected' => 'required|integer',
            'evacuees' => 'required|integer',
            'addMoreInputFields.*.street' => 'required',
            'addMoreInputFields.*.families' => 'required|integer',
        ], $messages = [
            'typeOfdisaster.required' => 'The type of disaster field is required!',
            'monthOfdisaster.required' => 'The month of disaster field is required!',
            'dayOfdisaster.required' => 'The day of disaster field is required!',
            'dayOfdisaster.integer' => 'The day of disaster must be an integer.',
            'yearOfdisaster.required' => 'The year of disaster field is required!',
            'yearOfdisaster.max' => 'Enter a valid year!',
            'barangay.required' => 'The barangay field is required!',
            'familiesAffected.required' => 'The families affected field is required!',
            'familiesAffected.integer' => 'Enter a valid number!',
            'individualsAffected.required' => 'The individuals affected field is required!',
            'individualsAffected.integer' => 'Enter a valid number!',
            'evacuees.required' => 'The evacuees field is required!',
            'evacuees.integer' => 'Enter a valid number!',
            'addMoreInputFields.*.street.required' => 'The street field is required!',
            'addMoreInputFields.*.families.required' => 'The number of families field is required!',
            'addMoreInputFields.*.families.integer' => 'Enter a valid number!',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/stats/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            DisasterReport::where('id', $id)->update([
                'type_disaster' => $request->input('typeOfdisaster'),
                'name_disaster' => $request->input('nameOfdisaster'),
                'month_disaster' => $request->input('monthOfdisaster'),
                'day_disaster' =>  $request->input('dayOfdisaster'),
                'year_disaster' => $request->input('yearOfdisaster'),
                'barangay' => $request->input('barangay'),
                'families_affected' => $request->input('familiesAffected'),
                'individuals_affected' => $request->input('individualsAffected'),
                'evacuees' => $request->input('evacuees')
            ]);

            //$id = DB::table('disaster_reports')
            //    ->where('month_disaster', $request->input('monthOfdisaster'))
            //    ->where('day_disaster', $request->input('dayOfdisaster'))
            //    ->where('year_disaster', $request->input('yearOfdisaster'))->value('id');

            foreach ($request->addMoreInputFields as $key => $values) {

                DisasterAffectedStreets::where('disaster_id', $id)->update([
                    'affected_streets' => $values['street'],
                    'number_families_affected' => $values['families'],
                ]);
            };


            return redirect('/admin/stats/')
                ->with('success', 'Disaster Report Saved!');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$disaster = DisasterReport::find($id);
        //$disaster->delete();
        //return redirect('/admin/stats/')->with('success', 'The disaster statistical report has been deleted!');

        DisasterReport::find($id)->delete();
        return response()->json(['message' => 'The disaster statistical report has been deleted!']);
    }
}
