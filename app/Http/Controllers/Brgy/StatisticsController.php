<?php

namespace App\Http\Controllers\Brgy;

use App\Http\Controllers\Controller;
use App\Models\DisasterReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('features.viewdisasterstatsreports');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.createdisasterstatsreport');
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
            'nameOfdisaster' => 'required|max:255',
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
            'nameOfdisaster.required' => 'The name of disaster field is required!',
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
            return redirect('/stats/create')
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


            return redirect('brgy_official/stats/create')
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
