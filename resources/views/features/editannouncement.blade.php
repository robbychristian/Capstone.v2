@extends('dashboard.admin.home')
@section('title', '| Announcements')
@section('sub-content')

    <div class="container">
        @if (Auth::user()->user_role === 1)
            <form action="/admin/announcements/{{ $announcement->id }}" method="POST">
        @elseif (Auth::user()->user_role === 3)
            <form action="/brgy_official/announcements/{{ $announcement->id }}" method="POST">
        @endif
        @csrf
        @method('PUT')
        <div class="form-group">
            <label><strong>Title</strong></label>
            <input type="text" name="title" class="form-control" value="{{ $announcement->title }}">
        </div>
        <div class="form-group">
            <label><strong>Recipients</strong></label>
            <select class="form-control">
                <option>All Residents</option>
                <option>All Barangay Officials</option>
            </select>
        </div>
        <div class="form-group">
            <label><strong>Message</strong></label>
            <textarea name="message" id="" cols="30" rows="10" class="form-control">{{ $announcement->body }}</textarea>
        </div>
        <button class="btn btn-primary float-right ">Post</button>
        </form>
    </div>


@endsection
