@extends('layouts.master')

@section('title', '| Pending Announcements')
@section('content')
    <div class="container-fluid" style="color: black;">
        <h1 class="h3 mb-4 text-gray-800">Pending Announcements</h1>
        <div class="card">
            <ul class="list-group list-group-flush">
                @foreach ($announcements as $announcement)
                    <li class="list-group-item">
                        <h3>{{ $announcement->title }}</h3>
                        <div class="text-muted d-flex flex-column">
                            <p>Issued To: {{ $announcement->brgy_loc }}</p>
                            <p>Issued By: {{ $announcement->name }}</p>
                            <p>Date Issued: {{ $announcement->created_at }}</p>
                        </div>
                        <p>{{ $announcement->body }}</p>




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
                    </li>
                @endforeach

            </ul>
        </div>


    </div>
@endsection
