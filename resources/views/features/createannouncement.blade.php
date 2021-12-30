@extends('layouts.master')
@section('title', '| Announcements')
@section('content')
    <div class="container-fluid" style="color: black;">
        <h1 class="h3 mb-4 text-gray-800">Create an Announcement</h1>
        <div class="container-fluid">
            @if (Auth::user()->user_role === 1)
                <form action="/admin/announcements" method="POST">
                @elseif (Auth::user()->user_role >= 3)
                    <form action="/user/announcements" method="POST">
            @endif
            @csrf
            <div class="form-group">
                <label><strong>Title</strong></label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                <small class="text-danger">@error('title')
                        {{ $message }}
                    @enderror</small>
            </div>
            @if (Auth::user()->user_role === 1)
                <div class="form-group">
                    <label><strong>Recipients</strong></label>
                    <select name="brgy_loc" class="form-control" value="{{ old('brgy_loc') }}">
                        <option value="all">All Announcements</option>
                        @foreach ($barangays as $barangay)
                            <option value='{{ $barangay->brgy_loc }}'>{{ $barangay->brgy_loc }}</option>
                        @endforeach
                    </select>
                    <small class="text-danger">@error('brgy_loc')
                            {{ $message }}
                        @enderror</small>
                </div>
            @endif
            <div class="form-group">
                <label><strong>Message</strong></label>
                <textarea name="message" id="" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
                <small class="text-danger">@error('message')
                        {{ $message }}
                    @enderror</small>
            </div>
            @if (Auth::user()->user_role == 1)
                <a class="btn btn-outline-secondary float-right" href="{{ route('admin.announcements.index') }}"
                    role="button">Cancel</a>

            @elseif (Auth::user()->user_role == 3)
                <a class="btn btn-outline-secondary float-right" href="" role="button">Cancel</a>
            @endif

            <button class="btn btn-primary float-right mr-2">Post</button>

            </form>
        </div>

    </div>
@endsection
