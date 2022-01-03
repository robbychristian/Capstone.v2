@extends('layouts.master')

@section('title', '| Pending Announcements')
@section('content')
    <div class="container-fluid" style="color: black;">
        <h1 class="h3 mb-4 text-gray-800">Pending Announcements</h1>
        <div class="card">
            <ul class="list-group list-group-flush">
                @foreach ($announcements as $announcement)
                    <li class="list-group-item">
                        <h4>{{ $announcement->title }}</h4>
                        <div class="text-muted d-flex flex-column mb-3">
                            <small>Issued To: {{ $announcement->brgy_loc }}</small>
                            <small>Issued By: {{ $announcement->name }}</small>
                            <small>Date Issued: {{ date('M d, Y \a\t h:i A', strtotime($announcement->created_at)) }}</small>
                        </div>
                        <p>{{ $announcement->body }}</p>

                        @if (Auth::user()->user_role == 1)
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <form action="/admin/announcements/approve/{{ $announcement->id }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <button class="btn btn-success btn-icon-split mr-3">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Approve</span>
                                    </button>
                                </form>
                                <form action="/admin/announcements/disapprove/{{ $announcement->id }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <button class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-times"></i>
                                        </span>
                                        <span class="text">Disapprove</span>
                                    </button>
                                </form>
                            </div>
                        @elseif (Auth::user()->user_role >= 4)
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <form action="/user/announcements/approve/{{ $announcement->id }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <button class="btn btn-success btn-icon-split mr-3">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Approve</span>
                                    </button>
                                </form>
                                <form action="/user/announcements/disapprove/{{ $announcement->id }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <button class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-times"></i>
                                        </span>
                                        <span class="text">Disapprove</span>
                                    </button>
                                </form>
                            </div>
                        @endif

                    </li>
                @endforeach

            </ul>
        </div>


    </div>
@endsection
