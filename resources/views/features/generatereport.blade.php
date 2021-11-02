@extends('dashboard.admin.home')

@section('title', '| Generate Disaster Statistical Report')
@section('sub-content')

    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <div class="card" style="width: 30rem;">

            <div class="card-body">
                <h5 class="card-title">Generate Disaster Statistical Reports</h5>
                @if (Session::get('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if (Auth::user()->user_role === 1)
                    <form action="/admin/generate" method="POST">
                    @elseif (Auth::user()->user_role === 3)
                        <form action="/brgy_official/generate" method="POST">
                @endif
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputBrgy">Barangay</label>
                        @if (Auth::user()->user_role === 3)
                        <input class="form-control" type="text" value="{{ Auth::user()->brgy_loc }}" name="barangay" readonly>
                        @elseif(Auth::user()->user_role === 1)
                        <select id="inputBrgy" class="form-control" name="barangay" value="{{ old('barangay') }}">
                            <option value="">Barangay</option>
                            <option value='Barangay Dela Paz'>Barangay Dela Paz</option>
                            <option value='Barangay Manggahan'>Barangay Manggahan</option>
                            <option value='Barangay Maybunga'>Barangay Maybunga</option>
                            <option value='Barangay Rosario'>Barangay Rosario</option>
                            <option value='Barangay Santolan'>Barangay Santolan</option>
                        </select>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputDay">Month</label>
                        <select id="inputMonth" class="form-control" name="monthOfdisaster">
                            <option value=''>Month</option>
                            <option value='January'>January</option>
                            <option value='February'>February</option>
                            <option value='March'>March</option>
                            <option value='April'>April</option>
                            <option value='May'>May</option>
                            <option value='June'>June</option>
                            <option value='July'>July</option>
                            <option value='August'>August</option>
                            <option value='September'>September</option>
                            <option value='October'>October</option>
                            <option value='November'>November</option>
                            <option value='December'>December</option>
                        </select>

                    </div>

                    <div class="form-group col">
                        <label for="inputDay">Year</label>
                        <select id="inputYear" class="form-control" name="yearOfdisaster">
                            <option value="">Year</option>
                            <option value='2021'>2021</option>
                            <option value='2022'>2022</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Download</button>
                </form>

            </div>
        </div>
    </div>

@endsection
