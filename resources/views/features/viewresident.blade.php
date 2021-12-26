@extends('layouts.master')
@section('title', '| Manage Resident')
@section('content')
    <div class="container-fluid" style="color: black">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Resident Profile</h1>
        </div>

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <img src="{{ URL::asset('KabisigGit/storage/app/public/profile_pics/' . $user->id . '/' . $profile->profile_pic) }}"
                            class="img-responsive" style="width: 100%; object-fit: cover; height: 300px;">
                        <h4 class="text-center mb-3 mt-4"> {{ $user->first_name }} {{ $profile->middle_name }}
                            {{ $user->last_name }}</h4>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">

                                <div class="row">
                                    <div class="col-sm-3 col-lg-2">User ID</div>
                                    <div class="col-sm-9 col-lg-10">{{ $user->id }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                            <li class="list-group-item">A fourth item</li>
                            <li class="list-group-item">And a fifth one</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection
