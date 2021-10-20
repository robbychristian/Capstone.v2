@extends('dashboard.admin.home')

@section('title', '| Generate Disaster Statistical Report')
@section('sub-content')

    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <h3 class="mb-3">{{ $barangay }}</h3>
        <div class="card" style="width: 30rem;">

            <div class="card-body">
                <h5 class="card-title">Generate Disaster Statistical Reports</h5>
                @if (Session::get('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                    
                <form action="/lgu/generate" method="POST">
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

                        </div>

                        <div class="form-group col">
                            <label for="brgy">Barangay</label>
                            <input class="form-control" type="text" value="{{ $barangay }}" name ="barangay" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Download</button>
                </form>

            </div>
        </div>
    </div>

@endsection
