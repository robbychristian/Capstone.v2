@extends('layouts.master')

@section('title', '| Announcements')
@section('content')

    <div class="container-fluid" style="color: black;">
        
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm active mb-3" role="button"
            aria-pressed="true">Back</a>

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
