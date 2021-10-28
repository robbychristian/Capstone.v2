@extends('dashboard.admin.home')

@section('title', '| Announcements')
@section('sub-content')

    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">

        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h3 class="mb-1">Announcements</h3>

            </div>
            <!-- Button trigger modal -->

            @if (Auth::user()->user_role === 3 || Auth::user()->user_role === 1)
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

                        @elseif(Auth::user()->user_role === 3)
                            <a href="{{ route('brgy_official.announcements.create') }}">
                                <button type="button" class="btn btn-primary me-md-2" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <span class="mr-2"><i class="fas fa-plus fa-1x"></i></span>Create Announcement
                                </button>
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        @if(!$announcements->isEmpty())
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
                                    <div class="v-announcement-title"><a href="#">{{ $announcement->title }}</a></div>
                                    <div class="v-announcement-message">{{ $announcement->body }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-3 col-lg-2 col-xl-2">
                                <div class="d-flex flex-column">
                                    <div class="v-announcement-date-title">Posted on:</div>
                                    <div class="v-announcement-date">{{ Carbon\Carbon::parse($announcement->created_at)->format('d F Y') }}</div>
                                </div>
                                @if (Auth::user()->user_role === 3 || Auth::user()->user_role === 1)
                                    @if (Auth::user()->user_role === 1)
                                        <div class="d-flex flex-row">
                                            <div class="v-announcement-date-title mr-2">
                                                <a href="/admin/announcements/{{ $announcement->id }}/edit">
                                                    <button class="btn btn-success">Edit</button>
                                                </a>
                                            </div>
                                            <div class="v-announcement-date">
                                                <form action="/admin/announcements/{{ $announcement->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @elseif(Auth::user()->user_role === 3)
                                        <div class="d-flex flex-row">
                                            <div class="v-announcement-date-title mr-2">
                                                <a href="/brgy_official/announcements/{{ $announcement->id }}/edit">
                                                    <button class="btn btn-success">Edit</button>
                                                </a>
                                            </div>
                                            <div class="v-announcement-date">
                                                <form action="/brgy_official/announcements/{{ $announcement->id }}"
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
        @else
        <div class="card">
            <div class="card-body">
                There are no announcements.
            </div>
        </div>
        @endif

    </div>



@endsection
