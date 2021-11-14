@extends('layouts.master')

@section('title', '| Generate Disaster Statistical Report')
@section('content')

    <div class="container-fluid" style="color: black;">

        <div class="card" style="width: 30rem;">

            <div class="card-body">
                <h5 class="card-title">Generate Disaster Statistical Reports</h5>
                @if (Session::get('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <form action="/lgu/generate/{{ $barangay }}/{{ $barangay }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputBrgy">Barangay</label>
                            <input class="form-control" type="text" value="{{ $barangay }}" name="barangay" readonly>
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
