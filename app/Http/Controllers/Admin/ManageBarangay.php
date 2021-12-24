<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageBarangay extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangays = Barangay::all();
        return view('features.addbarangays', [
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

    public function addBarangay($id)
    {
        $barangay = DB::table('barangays')
            ->where('id', $id)
            ->update(['is_added' => 1]);
        return redirect('admin/managebarangay/create')->with('success', 'Barangay added!');
    }

    public function deleteBarangay($id)
    {
        $barangay = DB::table('barangays')
            ->where('id', $id)
            ->update(['is_added' => 0]);
        return redirect('admin/managebarangay/create')->with('success', 'Barangay removed!');
    }

    public function mobileBarangays()
    {
        $barangays = DB::table('barangays')
            ->where('is_added', 1)
            ->get();
        return $barangays;
    }
}
