@extends('layouts.master')
@section('title', '| Send Report')
@section('content')

    <div class="container-fluid" style="color: black;">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Send Report</h1>
        </div>


        <div class="card">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="" aria-describedby="emailHelp"
                            value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">File Upload</label>
                        <input name="file" class="form-control" type="file" id="formFile">
                        @error('file')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <a class="btn btn-outline-secondary mr-2" href="{{ route('user.dashboard-lgu.index') }}"
                        role="button">Cancel</a>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
