@extends('layouts.master')
@section('title', '| Guidelines')
@section('content')

    <div class="container-fluid" style="color: black;">
        <h1 class="h3 mb-4 text-gray-800">Create a Guideline</h1>
        <div class="container-fluid">
            @if (Auth::user()->user_role === 1)
                <form action="/admin/guidelines/{{ $guidelines->id }}" method="POST">
                    @csrf
                    @method('PUT')
                @elseif (Auth::user()->user_role >= 3)
                    <form action="/user/guidelines/{{ $guidelines->id }}" method="POST">
                        @csrf
                        @method('PUT')
            @endif
            @csrf
            <div class="form-group">
                <label><strong>Disaster</strong></label>
                <select name="disaster" class="form-control" value="{{ $guidelines->disaster }}">
                    <option value="Flood" {{ $guidelines->disaster == 'Flood' ? 'selected' : '' }}>Flood</option>
                    <option value="Earthquake" {{ $guidelines->disaster == 'Earthquake' ? 'selected' : '' }}>Earthquake
                    </option>
                    <option value="Tropical Cyclone" {{ $guidelines->disaster == 'Tropical Cyclone' ? 'selected' : '' }}>
                        Tropical Cyclone</option>
                    <option value="Tsunami" {{ $guidelines->disaster == 'Tsunami' ? 'selected' : '' }}>Tsunami</option>
                </select>
                <small class="text-danger">@error('disaster')
                        {{ $message }}
                    @enderror</small>
            </div>

            <div class="form-group">
                <label><strong>Time of Disaster</strong></label>
                <select name="time" class="form-control">
                    <option value="Before" {{ $guidelines->time == 'Before' ? 'selected' : '' }}>Before</option>
                    <option value="During" {{ $guidelines->time == 'During' ? 'selected' : '' }}>During</option>
                    <option value="After" {{ $guidelines->time == 'After' ? 'selected' : '' }}>After</option>
                </select>
                <small class="text-danger">@error('time')
                        {{ $message }}
                    @enderror</small>
            </div>

            <div class="form-group">
                <label><strong>Guideline</strong></label>
                <textarea name="guideline" id="" cols="10" rows="10"
                    class="form-control">{{ $guidelines->guideline }}</textarea>
                <small class="text-danger">@error('guideline')
                        {{ $message }}
                    @enderror</small>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                @if (Auth::user()->user_role == 1)
                    <a class="btn btn-outline-secondary mr-2" href="/admin/guidelines" role="button">Cancel</a>

                @elseif (Auth::user()->user_role >= 4)

                    <a class="btn btn-outline-secondary mr-2" href="/user/guidelines" role="button">Cancel</a>
                @endif

                <button class="btn btn-primary">Post</button>
            </div>

            </form>
        </div>

    </div>

@endsection
