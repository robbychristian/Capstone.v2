<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
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
        $announcements = Announcement::latest()->paginate(10);
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
            'brgy_loc' => 'required',
            'message' => 'required',
        ], $messages = [
            'title.required' => 'The title field is required!',
            'brgy_loc.required' => 'The recipients field is required!',
            'message.required' => 'The body field is required!',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/announcements/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $announcement = Announcement::create([
                'admin_id' => 1,
                'brgy_position' => 'NaN',
                'name' => Auth::user()->name,
                'brgy_loc' =>  $request->input('brgy_loc'),
                'title' => $request->input('title'),
                'body' => $request->input('message')
            ]);

            return redirect('/admin/announcements')->with('success', 'Announcement has been posted!');
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
            return redirect('/admin/announcements/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            $announcement = Announcement::where('id', $id)->update([
                'title' => $request->input('title'),
                'body' => $request->input('message')
            ]);

            return redirect('/admin/announcements')->with('success', 'The announcement has been edited!');
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
        return redirect('/admin/announcements')->with('success', 'The announcement has been deleted!');
    }
}
