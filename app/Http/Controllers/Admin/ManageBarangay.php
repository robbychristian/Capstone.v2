<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class ManageBarangay extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Barangay::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a  data-id="' . $row->id . '" class="btn btn-success btn-sm" id="addbtn">Add</a>';
                    $btn = $btn . '<a  data-id="' . $row->id . '" class="btn btn-warning btn-sm ml-2" id="archivebtn">Archive</a>';

                    return $btn;
                })

                ->addColumn('is_added', function ($row) {
                    if ($row->is_added == '1') {
                        return '<label class="badge badge-success">Added</label>';
                    } else {
                        return '<label class="badge badge-danger">Not Added</label>';
                    }
                })

                ->rawColumns(['action', 'is_added'])
                ->make(true);
        }
        $barangays = Barangay::withTrashed()->get();
        return view('features.addbarangays', [
            'barangays' => $barangays
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        ////$barangay = DB::table('barangays')
        ////    ->where('id', $id)
        ////    ->delete();
        ////    //->update(['is_added' => 0]);
        ////return response()->json(['message' => 'The barangay has been archived!']);
        //
        //Barangay::find($id)->delete()->update(['is_added' => 1]);
        //return response()->json(['message' => 'The barangay has been archive!']); // fix deleted_at column not updating

    }

    public function delete($id) //ajax
    {
        //$barangay = DB::table('barangays')
        //    ->where('id', $id)
        //    ->update(['is_added' => 0, 'deleted_at' => now()]);
        $barangay = Barangay::find($id);
        $barangay->is_added = 0;
        $barangay->save();

        return response()->json(['message' => 'The barangay has been archived!']);
    }

    public function addBarangay($id) //ajax
    {
        //$barangay = DB::table('barangays')
        //    ->where('id', $id)
        //    ->update(['is_added' => 1, 'updated_at' => now()]);

        $barangay = Barangay::find($id);
        $barangay->is_added = 1;
        $barangay->updated_at = now();
        $barangay->save();
        return response()->json(['message' => 'The barangay has been added!']);
    }

    public function addBarangayMap($id)
    {
        //$barangay = DB::table('barangays')
        //    ->where('id', $id)
        //    ->update(['is_added' => 1, 'updated_at' => now()]);
        $barangay = Barangay::find($id);
        $barangay->is_added = 1;
        $barangay->updated_at = now();
        $barangay->save();

        return redirect('admin/managebarangay/')->with('success', 'The barangay has been added!');
    }

    public function deleteBarangay($id)
    {
        //$barangay = DB::table('barangays')
        //    ->where('id', $id)
        //    ->update(['is_added' => 0, 'deleted_at' => now()]);

        $barangay = Barangay::find($id);
        $barangay->is_added = 0;
        $barangay->save();
        
        return redirect('admin/managebarangay/')->with('success', 'The barangay has been archived!');
    }

    public function mobileBarangays()
    {
        $barangays = DB::table('barangays')
            ->where('is_added', 1)
            ->get();
        return $barangays;
    }
}
