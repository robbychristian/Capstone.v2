@extends('layouts.master')

@section('title', '| Announcements')
@section('content')

    <div class="container-fluid" style="color: black;">

        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h1 class="h3 mb-4 text-gray-800">Announcements</h1>

            </div>
            <!-- Button trigger modal -->

            @if (Auth::user()->user_role >= 3 || Auth::user()->user_role === 1)
                <!--ACCESSIBLE ONLY TO ADMIN/BRGY-->
                <div class="col-sm-12 col-md-4">
                    <div class="row"></div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        @if (Auth::user()->user_role === 1)
                            <a href="{{ route('admin.announcements.create') }}">
                                <button type="button" class="btn btn-primary me-md-2" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <span class="mr-2"><i class="fas fa-plus fa-1x"></i></span>Create Announcement
                                </button>
                            </a>

                            <a href="{{ route('admin.pendingannouncements.index') }}">
                                <button type="button" class="btn btn-warning me-md-2 ml-3" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <span class="mr-2"><i
                                            class="fas fa-exclamation-triangle fa-1x"></i></span>Pending Announcements
                                </button>
                            </a>


                        @elseif(Auth::user()->user_role >= 3)
                            <a href="{{ route('user.announcements.create') }}">
                                <button type="button" class="btn btn-primary me-md-2" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <span class="mr-2"><i class="fas fa-plus fa-1x"></i></span>Create Announcement
                                </button>
                            </a>

                            <a href="#" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Pending Announcements</span>
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        @if (Session::get('success'))
            <div class="alert alert-success mt-3 mb-3">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (count($announcements) > 0)

            <div class="card w-100 card-announce-custom-bg mt-3">
                <ul class="list-group list-group-flush">
                    <!-- ANNOUNCEMENT LIST -->
                    @foreach ($announcements as $announcement)
                        <li class="list-group-item announcement-list">
                            <div class="d-flex flex-row align-items-center">
                                <div class="col-sm-2 col-md-3 col-lg-2 col-xl-1"><i class="fas fa-user-circle fa-4x"
                                        style="color: #DEDEDE"></i>
                                </div>
                                <div class="col-sm-8 col-md-6 col-lg-8 col-xl-9">
                                    <div class="d-flex flex-column">
                                        <div class="v-announcement-title">
                                            @if (Auth::user()->user_role >= 2)
                                                <a
                                                    href="/user/announcements/{{ $announcement->id }}">{{ $announcement->title }}</a>


                                            @elseif (Auth::user()->user_role === 1)
                                                <a
                                                    href="/admin/announcements/{{ $announcement->id }}">{{ $announcement->title }}</a>
                                            @endif

                                        </div>
                                        <div class="v-announcement-message">
                                            {{ \Illuminate\Support\Str::limit($announcement->body, 140, '...') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-md-3 col-lg-2 col-xl-2">
                                    <div class="d-flex flex-column">
                                        <div class="v-announcement-date-title">Posted on:</div>
                                        <div class="v-announcement-date">
                                            {{ date('M d, Y \a\t h:i A', strtotime($announcement->created_at)) }}</div>
                                    </div>
                                    @if (Auth::user()->user_role >= 3 || Auth::user()->user_role === 1)
                                        @if (Auth::user()->user_role === 1)
                                            <div class="d-flex flex-row">
                                                <div class="v-announcement-date-title mr-2">
                                                    <a href="/admin/announcements/{{ $announcement->id }}/edit">
                                                        <button class="btn btn-success">Edit</button>
                                                    </a>
                                                </div>
                                                <div class="v-announcement-date">
                                                    <form action="/admin/announcements/{{ $announcement->id }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @elseif(Auth::user()->user_role === 3)
                                            <div class="d-flex flex-row">
                                                <div class="v-announcement-date-title mr-2">
                                                    <a href="/user/announcements/{{ $announcement->id }}/edit">
                                                        <button class="btn btn-success">Edit</button>
                                                    </a>
                                                </div>
                                                <div class="v-announcement-date">
                                                    <form action="/user/announcements/{{ $announcement->id }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </li>


                    @endforeach

                    <!-- END OF ANNOUNCEMENT LIST -->
                </ul>
            </div>

            <div class="d-grid gap-2 mt-5 d-md-flex justify-content-md-end">
                {{ $announcements->links() }}
            </div>
        @else
            <div class="card mt-3">
                <div class="card-body" style="font-weight: 400; font-size: 1rem;">
                    There are no announcements to show.
                </div>
            </div>
        @endif

    </div>



@endsection
