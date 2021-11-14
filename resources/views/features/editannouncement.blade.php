@extends('layouts.master')
@section('content')
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
            <small class="text-danger">@error('title')
                {{ $message }}
            @enderror</small>
        </div>
        <div class="form-group">
            <label><strong>Message</strong></label>
            <textarea name="message" id="" cols="30" rows="10" class="form-control">{{ $announcement->body }}</textarea>
            <small class="text-danger">@error('message')
                {{ $message }}
            @enderror</small>
        </div>
        <button class="btn btn-primary float-right ">Post</button>
        </form>
    </div>

</div>
@endsection
