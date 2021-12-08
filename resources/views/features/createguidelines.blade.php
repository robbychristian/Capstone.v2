@extends('layouts.master')
@section('title', '| Guidelines')
@section('content')

    <div class="container-fluid" style="color: black;">
        <h1 class="h3 mb-4 text-gray-800">Create a Guideline</h1>
        <div class="container-fluid">
            @if (Auth::user()->user_role === 1)
                <form action="/admin/guidelines" method="POST">
                @elseif (Auth::user()->user_role >= 3)
                    <form action="/user/guidelines" method="POST">
            @endif
            @csrf
            <div class="form-group">
                <label><strong>Disaster</strong></label>
                <select name="disaster" class="form-control" value="{{ old('disaster') }}">
                    <option value="Flood">Flood</option>
                    <option value="Earthquake">Earthquake</option>
                    <option value="Tropical Cyclone">Tropical Cyclone</option>
                    <option value="Tsunami">Tsunami</option>
                </select>
                <small class="text-danger">@error('disaster')
                        {{ $message }}
                    @enderror</small>
            </div>

            <div class="form-group">
                <label><strong>Time of Disaster</strong></label>
                <select name="time" class="form-control" value="{{ old('time') }}">
                    <option value="before">Before</option>
                    <option value="during">During</option>
                    <option value="after">After</option>
                </select>
                <small class="text-danger">@error('time')
                        {{ $message }}
                    @enderror</small>
            </div>

            <div class="form-group">
                <label><strong>Guideline</strong></label>
                <textarea name="guideline" id="" cols="10" rows="10"
                    class="form-control">{{ old('guideline') }}</textarea>
                <small class="text-danger">@error('guideline')
                        {{ $message }}
                    @enderror</small>
            </div>
            <button class="btn btn-primary float-right ">Post</button>
            </form>
        </div>

    </div>

@endsection
