@extends('dashboard.admin.home')
@section('title', '| Announcements')
@section('sub-content')
<div class="col-xl-10 col-lg-9 col-md-8 mt-3">
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
        @if (Auth::user()->user_role === 1)
            <div class="form-group">
                <label><strong>Recipients</strong></label>
                <select name="brgy_loc" class="form-control" value="{{ old('brgy_loc') }}">
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
            <textarea name="message" id="" cols="30" rows="10" class="form-control">{{ $announcement->body }}</textarea>
        </div>
        <button class="btn btn-primary float-right ">Post</button>
        </form>
    </div>

</div>
@endsection
