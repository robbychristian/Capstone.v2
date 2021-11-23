@extends('layouts.master')

@section('title', '| Announcements')
@section('content')

    <div class="container-fluid" style="color: black;">

        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h1 class="h3 mb-4 text-gray-800">Announcements</h1>
            </div>

            <div class="card border-light mb-3">
                <div class="card-header"></div>
                <div class="card-body">

                    <h1 class="display-4">{{ $announcement->title }}</h1>

                    <p class="card-text">{{ $announcement->body }}</p>
                </div>
            </div>

        </div>

    </div>

@endsection
