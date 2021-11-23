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
                    <div class="container">
                        <div class="d-flex flex-row">
                            <div class="col-2">
                                <i class="fas fa-user-circle fa-4x" style="color: #DEDEDE"></i>
                            </div>

                            <div class="col-10">
                                <div class="d-flex flex-column bd-highlight mb-3">
                                    <h2 class="card-title">{{ $announcement->title }}</h2>
                                    <div class="p-2 bd-highlight">{{ $announcement->name }}</div>
                                    <div class="p-2 bd-highlight">
                                        {{ date('M d, Y \a\t h:m a', strtotime($announcement->created_at)) }}</div>
                                </div>
                            </div>
                        </div>
                        <!--
                                    <div class="row">
                                        <div class="col">
                                            <div class="col"><i class="fas fa-user-circle fa-4x" style="color: #DEDEDE"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-column bd-highlight mb-3">
                                                <h2 class="card-title">{{ $announcement->title }}</h2>
                                                <div class="p-2 bd-highlight">{{ $announcement->name }}</div>
                                                <div class="p-2 bd-highlight">
                                                    {{ date('M d, Y \a\t h:m a', strtotime($announcement->created_at)) }}</div>
                                            </div>
                                        </div>
                                    </div> -->
                    </div>


                    <p class="card-text">{{ $announcement->body }}</p>
                </div>
            </div>

        </div>

    </div>

@endsection
