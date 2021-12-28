@extends('layouts.master')

@section('title', '| Announcements')
@section('content')

    <div class="container-fluid" style="color: black;">
        @if (Auth::user()->user_role === 1)
            <a class="btn btn-primary btn-sm mb-3" href="/admin/announcements" role="button">Back</a>
        @elseif (Auth::user()->user_role === 3)
            <a class="btn btn-primary btn-sm mb-3" href="/brgy_official/announcements" role="button">Back</a>
        @endif


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Announcements</h1>
        </div>

        <div class="card mb-3 w-100">
            <div class="card-body">
                <div class="d-flex flex-column  mb-3">
                    <h2 class="card-title">{{ $announcement->title }}</h2>
                    <small class=" bd-highlight text-muted">Issued by: {{ $announcement->name }}</small>
                    <small class=" bd-highlight text-muted">
                        {{ date('F d, Y \a\t h:i A', strtotime($announcement->created_at)) }}</small>
                </div>
                <p class="card-text">{{ $announcement->body }}</p>
            </div>
        </div>
    </div>

@endsection
