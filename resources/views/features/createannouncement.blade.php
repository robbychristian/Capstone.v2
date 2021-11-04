@extends('dashboard.admin.home')
@section('title', '| Announcements')
@section('sub-content')

    <div class="container">
        @if (Auth::user()->user_role === 1)
            <form action="/admin/announcements" method="POST">
            @elseif (Auth::user()->user_role === 3)
                <form action="/brgy_official/announcements" method="POST">
        @endif
        @csrf
        <div class="form-group">
            <label><strong>Title</strong></label>
            <input type="text" name="title" class="form-control">
            <small class="text-danger">@error('title')
                    {{ $message }}
                @enderror</small>
        </div>
        @if (Auth::user()->user_role === 1)
            <div class="form-group">
                <label><strong>Recipients</strong></label>
                <select name="brgy_loc" class="form-control">
                    <option value="">Barangay</option>
                    <option value='Barangay Dela Paz'>Barangay Dela Paz</option>
                    <option value='Barangay Manggahan'>Barangay Manggahan</option>
                    <option value='Barangay Maybunga'>Barangay Maybunga</option>
                    <option value='Barangay Rosario'>Barangay Rosario</option>
                    <option value='Barangay Santolan'>Barangay Santolan</option>
                </select>
                <small class="text-danger">@error('brgy_loc')
                        {{ $message }}
                    @enderror</small>
            </div>
        @endif
        <div class="form-group">
            <label><strong>Message</strong></label>
            <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
            <small class="text-danger">@error('message')
                    {{ $message }}
                @enderror</small>
        </div>
        <button class="btn btn-primary float-right ">Post</button>
        </form>
    </div>


@endsection
