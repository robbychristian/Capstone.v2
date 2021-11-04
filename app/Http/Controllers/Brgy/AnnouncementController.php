<?php

namespace App\Http\Controllers\Brgy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;
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
        $announcements = Announcement::where('brgy_loc', '=', Auth::user()->brgy_loc)->latest()->paginate(10);
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
        return view('features.createannouncement');
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
            return redirect('/brgy_official/announcements/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $announcement = Announcement::create([
                'brgy_position' => Auth::user()->brgy_position,
                'name' => Auth::user()->name,
                'brgy_loc' => Auth::user()->brgy_loc,
                'title' => $request->input('title'),
                'body' => $request->input('message')
            ]);

            return redirect('/brgy_official/announcements')->with('success', 'Announcement has been posted!');
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
        $announcement = Announcement::where('id', $id)->update([
            'title' => $request->input('title'),
            'body' => $request->input('message')
        ]);

        return redirect('/brgy_official/announcements');
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

        return redirect('/brgy_official/announcements');
    }
}
