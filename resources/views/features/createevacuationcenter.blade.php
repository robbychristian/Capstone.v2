@extends('layouts.master')
@section('title', '| Evacuation Centers and Hospitals')
@section('content')

    <script>
        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode < 48 || ASCIICode > 57)
                return false;
            return true;
        }
    </script>

    <div class="container-fluid" style="color: black;">
        <h1 class="h3 mb-4 text-gray-800">Add an Evacuation Center</h1>

        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <form action="{{ route('admin.evacuation.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="evac_name" value="{{ old('evac_name') }}">

                        <small class="text-danger">@error('evac_name')
                            {{ $message }}
                        @enderror</small>
                    </div>

                    <div class="form-group">
                        <label>Barangay</label>
                        @if (Auth::user()->user_role === 1)
                            <select name="brgy_loc" class="form-control" value="{{ old('brgy_loc') }}">
                                @foreach ($barangays as $barangay)
                                    <option value='{{ $barangay->brgy_loc }}'>{{ $barangay->brgy_loc }}</option>
                                @endforeach
                            </select>
                        @endif

                        @if (Auth::user()->user_role >= 3)
                            <input class="form-control" type="text" name="brgy_loc" value="{{ Auth::user()->brgy_loc }}"
                                readonly>
                        @endif
                        <small class="text-danger">@error('brgy_loc')
                                {{ $message }}
                            @enderror</small>
                    </div>

                    <div class="form-group">
                        <label>Contact Number</label>
                        <input name="phone_no" type="text" class="form-control" onkeypress="return onlyNumberKey(event)"
                            maxlength="11" value={{ old('phone_no') }}>
                        <small class="text-danger">@error('phone_no')
                                {{ $message }}
                            @enderror</small>
                    </div>

                    <div class="form-group">
                        <label>Capacity</label>
                        <input name="capacity" type="text" class="form-control" onkeypress="return onlyNumberKey(event)"
                            value={{ old('capacity') }}>
                        <small class="text-danger">@error('capacity')
                                {{ $message }}
                            @enderror</small>
                    </div>

                    <div class="form-group">
                        <label>Availability</label>
                    </div>

                    <div class="btn-group btn-group-toggle" style="margin-top: -5px" data-toggle="buttons">
                        <label class="btn btn-success">
                            <input type="radio" name="availability" id="option1"> Available
                        </label>
                        <label class="btn btn-danger">
                            <input type="radio" name="availability" id="option2"> Not Available
                        </label>


                    </div>
                    <small class="text-danger">@error('availability')
                            {{ $message }}
                        @enderror</small>

                    <div class="mt-5">
                        <button class="btn btn-primary btn-block" type="submit">Add Evacuation Center</button>
                        <a class="btn btn-secondary btn-block" href="{{ route('admin.evacuation.index') }}"
                            role="button">Cancel</a>
                    </div>

                </form>
            </div>
        </div>


    </div>

@endsection
