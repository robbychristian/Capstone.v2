@extends('dashboard.admin.home')

@section('title', '| Create Disaster Statistical Report')
@section('sub-content')

    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <div class="card" style="width: 30rem;">

            <div class="card-body">
                <h5 class="card-title">Generate Disaster Statistical Reports</h5>
                <form action="#" method="POST">
                    @csrf
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
                            <div class="text-danger">@error('monthOfdisaster')
                                    {{ $message }}
                                @enderror</div>
                        </div>

                        <div class="form-group col">
                            <label for="inputDay">Year</label>
                            <select id="inputYear" class="form-control" name="yearOfdisaster">
                                <option value="">Year</option>
                                <option value='2021'>2021</option>
                                <option value='2022'>2022</option>
                            </select>
                            <div class="text-danger">@error('yearOfdisaster')
                                    {{ $message }}
                                @enderror</div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Download</button>
                </form>

            </div>
        </div>
    </div>

@endsection
