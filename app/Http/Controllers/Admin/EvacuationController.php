<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use App\Models\EvacuationCenters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;

class EvacuationController extends Controller
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
                ->where('is_approved', 1)
                ->where('deleted_at', null);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    return '<div class="d-flex justify-content-center align-items-center">
                    <div class="dropdown" style="text-align:center;">
                        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v text-primary fa-2x"></i>
                        </a>
                      
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Appprove</a>
                          <a class="dropdown-item" href=' . \URL::route('admin.evacuation.edit', $row->id) . '>Edit</a>
                          <a class="dropdown-item" data-id="' . $row->id . '" id="deleteEvacuationBtn">Delete</a>
                        </div>
                      </div>

                      </div>
                      ';
                })

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
                ->rawColumns(['action', 'is_approved', 'availability'])
                ->make(true);
        }

        $barangays = DB::table('barangays')
            ->where('is_added', 1)
            ->get();
        $evacuationcenters = EvacuationCenters::paginate(2);
        return view('features.evacuationcenter', [
            'evacuationcenters' => $evacuationcenters,
            'barangays' => $barangays,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangays = DB::table('barangays')
            ->where('is_added', 1)
            ->get();

        return view('features.createevacuationcenter', [
            'barangays' => $barangays
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
            'evac_name' => 'required',
            'evac_latitude' => 'required',
            'evac_longitude' => 'required',
            'nearest_landmark' => 'required',
            'brgy_loc' => 'required',
            'phone_no' => 'required',
            'capacity' => 'required',
            'availability' => 'required',
        ], $messages = [
            'evac_name.required' => 'The location field is required!',
            'evac_latitude.required' => 'The latitude field is required!',
            'evac_longitude.required' => 'The longitude field is required!',
            'nearest_landmark.required' => 'The nearest landmark field is required!',
            'brgy_loc.required' => 'The barangay field is required!',
            'phone_no.required' => 'The contact number field is required!',
            'capacity.required' => 'The capacity field is required!',
            'availability.required' => 'The availability field is required!',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/evacuation/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $evacuationcenters = EvacuationCenters::create([
                'added_by' => Auth::user()->name,
                'evac_name' => $request->input('evac_name'),
                'evac_latitude' => $request->input('evac_latitude'),
                'evac_longitude' => $request->input('evac_longitude'),
                'nearest_landmark' => $request->input('nearest_landmark'),
                'brgy_loc' => $request->input('brgy_loc'),
                'phone_no' => $request->input('phone_no'),
                'capacity' => $request->input('capacity'),
                'availability' => $request->input('availability'),
                'is_approved' => 1,
            ]);

            return redirect('/admin/evacuation')->with('success', 'The evacuation center has been added!');
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
        $barangays = DB::table('barangays')
            ->where('is_added', 1)
            ->get();
        $evacuationcenter = EvacuationCenters::find($id);
        return view('features.editevacuationcenter', [
            'barangays' => $barangays,
            'evacuationcenter' => $evacuationcenter
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
            'evac_name' => 'required',
            'evac_latitude' => 'required',
            'evac_longitude' => 'required',
            'nearest_landmark' => 'required',
            'brgy_loc' => 'required',
            'phone_no' => 'required',
            'capacity' => 'required',
            'availability' => 'required',
        ], $messages = [
            'evac_name.required' => 'The location field is required!',
            'evac_latitude.required' => 'The latitude field is required!',
            'evac_longitude.required' => 'The longitude field is required!',
            'nearest_landmark.required' => 'The nearest landmark field is required!',
            'brgy_loc.required' => 'The barangay field is required!',
            'phone_no.required' => 'The contact number field is required!',
            'capacity.required' => 'The capacity field is required!',
            'availability.required' => 'The availability field is required!',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/evacuation/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            $evacuationcenters = EvacuationCenters::where('id', $id)->update([
                //'added_by' => Auth::user()->name,
                'evac_name' => $request->input('evac_name'),
                'evac_latitude' => $request->input('evac_latitude'),
                'evac_longitude' => $request->input('evac_longitude'),
                'nearest_landmark' => $request->input('nearest_landmark'),
                'brgy_loc' => $request->input('brgy_loc'),
                'phone_no' => $request->input('phone_no'),
                'capacity' => $request->input('capacity'),
                'availability' => $request->input('availability'),
                //'is_approved' => 1,
            ]);

            return redirect('/admin/evacuation')->with('success', 'The evacuation center has been edited!');
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
        //EvacuationCenters::find($id)->delete();
        //return response()->json(['success' => 'The evacuation center has been deleted!']);
        //$evacuationcenter = new EvacuationCenters;
        //$evacuationcenter->deleteData($id);
        //return response()->json(['success' => 'The evacuation center has been deleted!']);
       //$evacuationcenter = EvacuationCenters::find($id);
       //$evacuationcenter->delete();
       //return redirect('/admin/evacuation');

       EvacuationCenters::find($id)->delete();
       return redirect('/admin/evacuation');
       //return response()->json(['message' => 'The evacuation center has been deleted! Please refresh the page']);
    }

    public function approve($id)
    {
        $pendingEvacuationCenter = DB::table('evacuation_centers')
            ->where('id', $id)
            ->update(['is_approved' => 1, 'updated_at' => now()]);

        return redirect('/admin/evacuation')->with('success', 'The evacuation center has been approved!');
    }

}
