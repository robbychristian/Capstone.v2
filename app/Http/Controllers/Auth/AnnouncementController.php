<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $announcements = Announcement::where('brgy_loc', '=', Auth::user()->brgy_loc)
        //     ->where('brgy_loc', '=', 'all')
        //     ->latest()
        //     ->paginate(10);
        $announcements = DB::table('announcements')
            ->where('brgy_loc', Auth::user()->brgy_loc)
            ->where('approved', 1)
            ->where('deleted_at', null)
            ->orWhere('brgy_loc', 'all')
            ->latest()
            ->paginate(10);
        return view('features.announcement', [
            'announcements' => $announcements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allBrgys = DB::table('barangays')
            ->get();

        return view('features.createannouncement', [
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
            'title' => 'required',
            'message' => 'required',
        ], $messages = [
            'title.required' => 'The title field is required!',
            'message.required' => 'The body field is required!',
        ]);

        if ($validator->fails()) {
            return redirect('/user/announcements/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $announcement = Announcement::create([
                'brgy_id' => Auth::user()->id,
                'name' => Auth::user()->first_name .' '. Auth::user()->last_name,
                'brgy_loc' => Auth::user()->brgy_loc,
                'title' => $request->input('title'),
                'body' => $request->input('message'),
                'approved' => $request->input('approved')
            ]);

            return redirect('/user/announcements')->with('success', 'Announcement has been posted!');
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
        return view('features.viewannouncement', [
            'announcement' => Announcement::findOrFail($id),
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
        $announcement = Announcement::find($id);
        return view('features.editannouncement')->with('announcement', $announcement);
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
            'title' => 'required',
            'message' => 'required',
        ], $messages = [
            'title.required' => 'The title field is required!',
            'message.required' => 'The body field is required!',
        ]);
        if ($validator->fails()) {
            return redirect('/user/announcements/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            //$announcement = Announcement::where('id', $id)->update([
            //    'title' => $request->input('title'),
            //    'body' => $request->input('message')
            //]);

            $announcement = Announcement::find($id);
            $announcement->title = $request->input('title');
            $announcement->body = $request->input('message');
            $announcement->save();


            return redirect('/user/announcements')->with('success', 'Announcement has been edited!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect('/user/announcements');
    }

    public function fetchAnnouncements($brgy)
    {
        $announcements = DB::table('announcements')
            ->where('brgy_loc', $brgy)
            ->orderBy('created_at', 'desc')
            ->get();

        return $announcements;
    }

    public function approve($id)
    {
        $pendingAnnouncement = DB::table('announcements')
            ->where('id', $id)
            ->update(['approved' => 1, 'updated_at' => now()]);

        return redirect('/user/announcements')->with('success', 'The announcement has been approved!');
    }

    public function disapprove($id)
    {
        $pendingAnnouncement = DB::table('announcements')
            ->where('id', $id)
            ->update(['approved' => 0, 'deleted_at' => now()]);
        return redirect('/user/announcements')->with('success', 'The announcement has been disapproved!');
    }
}
