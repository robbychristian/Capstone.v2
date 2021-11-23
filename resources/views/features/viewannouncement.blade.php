@extends('layouts.master')

@section('title', '| Announcements')
@section('content')

    <div class="container-fluid" style="color: black;">

        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h1 class="h3 mb-4 text-gray-800">Announcements</h1>
            </div>

            <div class="card border-light mb-3 w-100">
                <div class="card-header"></div>
                <div class="card-body">

                    <div class="d-flex flex-column  mb-3">
                        <h2 class="card-title">{{ $announcement->title }}</h2>
                        <small class=" bd-highlight text-muted">Issued by: {{ $announcement->name }}</small>
                        <small class=" bd-highlight text-muted">
                            {{ date('M d, Y \a\t h:m a', strtotime($announcement->created_at)) }}</small>
                    </div>
                    <p class="card-text">{{ $announcement->body }}</p>




                </div>
            </div>

        </div>

    </div>

@endsection
