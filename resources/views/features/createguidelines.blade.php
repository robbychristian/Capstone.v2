@extends('layouts.master')
@section('title', '| Guidelines')
@section('content')
<!--edit dropdowns --> 
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
                <select name="disaster" class="form-control">
                    <option disabled hidden selected>Select the Disaster</option>
                    <option value="Flood" {{ old('disaster') == 'Flood' ? 'selected' : '' }}>Flood</option>
                    <option value="Earthquake" {{ old('disaster') == 'Earthquake' ? 'selected' : '' }}>Earthquake</option>
                    <option value="Tropical Cyclone" {{ old('disaster') == 'Tropical Cyclone' ? 'selected' : '' }}>Tropical Cyclone</option>
                    <option value="Tsunami" {{ old('disaster') == 'Tsunami' ? 'selected' : '' }}>Tsunami</option>
                </select>
                <small class="text-danger">@error('disaster')
                        {{ $message }}
                    @enderror</small>
            </div>

            <div class="form-group">
                <label><strong>Time of Disaster</strong></label>
                <select name="time" class="form-control">
                    <option disabled hidden selected>Select the Time</option>
                    <option value="Before" {{ old('time') == 'Before' ? 'selected' : '' }}>Before</option>
                    <option value="During" {{ old('time') == 'During' ? 'selected' : '' }}>During</option>
                    <option value="After" {{ old('time') == 'After' ? 'selected' : '' }}>After</option>
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
