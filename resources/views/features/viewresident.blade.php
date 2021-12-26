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
                <div class="row d-flex">
                    <div class="col-sm-12 col-md-6 col-lg-4 align-items-center">
                        <div class="profile-pic" style="height: 300px; width: 300px; overflow: hidden;">
                            <img src="{{ URL::asset('KabisigGit/storage/app/public/profile_pics/' . $user->id . '/' . $profile->profile_pic) }}"
                                class="rounded-circle img-responsive" style="height: 300px;">
                        </div>

                        <h4> {{ $user->first_name }} {{ $profile->middle_name }} {{ $user->last_name }}</h4>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8">
                        <dl class="row">
                            <dt class="col-sm-3">User ID</dt>
                            <dd class="col-sm-9">{{ $user->id }}</dd>

                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">
                                <p>{{ $user->email }}</p>
                            </dd>

                            <hr>



                        </dl>
                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection
