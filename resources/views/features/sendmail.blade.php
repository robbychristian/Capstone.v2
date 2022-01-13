@extends('layouts.master')
@section('title', '| Send Report')
@section('content')

    <div class="container-fluid" style="color: black;">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Send Report</h1>
        </div>

        @if (Session::get('success'))
            <div class="alert alert-success mt-3 mb-3">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.sendreport.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="" aria-describedby="emailHelp" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control"  name="subject"
                            value="{{ old('subject') }}">
                        @error('subject')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Body</label>
                        <input type="text" class="form-control" name="body"
                            value="{{ old('body') }}">
                        @error('body')
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
