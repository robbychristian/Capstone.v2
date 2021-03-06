@extends('layouts.master')

@section('title', '| Generate Disaster Statistical Report')
@section('content')

    <div class="container-fluid" style="color: black">
        <div class="card" style="width: 30rem;">

            <div class="card-body">
                <h5 class="card-title">Generate Disaster Statistical Reports</h5>
                @if (Session::get('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if (Auth::user()->user_role === 1)
                    <form action="/admin/generate/{{ $barangay }}/{{ $barangay }}" method="POST">
                    @elseif (Auth::user()->user_role == 7)
                        <form action="/user/generate-lgu/{{ $barangay }}/{{ $barangay }}" method="POST">
                        @elseif (Auth::user()->user_role >= 4)
                            <form action="/user/generate" method="POST">
                @endif
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputBrgy">Barangay</label>
                        @if (Auth::user()->user_role === 1)
                            <input class="form-control" type="text" value="{{ $barangay }}" name="barangay" readonly>
                        @elseif(Auth::user()->user_role === 7)
                            <input class="form-control" type="text" value="{{ $barangay }}" name="barangay" readonly>
                        @elseif(Auth::user()->user_role >= 4)
                            <input class="form-control" type="text" value="{{ Auth::user()->brgy_loc }}" name="barangay"
                                readonly>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputDay">Month</label>
                        <select id="inputMonth" class="form-control" name="monthOfdisaster">
                            <option disabled hidden selected>Select Month</option>
                            <option value='January' {{ old('monthOfdisaster') == 'January' ? 'selected' : '' }}>
                                January</option>
                            <option value='February' {{ old('monthOfdisaster') == 'February' ? 'selected' : '' }}>
                                February</option>
                            <option value='March' {{ old('monthOfdisaster') == 'March' ? 'selected' : '' }}>
                                March
                            </option>
                            <option value='April' {{ old('monthOfdisaster') == 'April' ? 'selected' : '' }}>
                                April
                            </option>
                            <option value='May' {{ old('monthOfdisaster') == 'May' ? 'selected' : '' }}>
                                May
                            </option>
                            <option value='June' {{ old('monthOfdisaster') == 'June' ? 'selected' : '' }}>
                                June
                            </option>
                            <option value='July' {{ old('monthOfdisaster') == 'July' ? 'selected' : '' }}>
                                July
                            </option>
                            <option value='August' {{ old('monthOfdisaster') == 'August' ? 'selected' : '' }}>
                                August
                            </option>
                            <option value='September' {{ old('monthOfdisaster') == 'September' ? 'selected' : '' }}>
                                September</option>
                            <option value='October' {{ old('monthOfdisaster') == 'October' ? 'selected' : '' }}>
                                October</option>
                            <option value='November' {{ old('monthOfdisaster') == 'November' ? 'selected' : '' }}>
                                November</option>
                            <option value='December' {{ old('monthOfdisaster') == 'December' ? 'selected' : '' }}>
                                December</option>
                        </select>

                    </div>

                    <div class="form-group col">
                        <label for="inputDay">Year</label>
                        <select id="inputYear" class="form-control" name="yearOfdisaster">
                            <option disabled hidden selected>Select Year</option>
                            <option value='2021' {{ old('yearOfdisaster') == '2021' ? 'selected' : '' }}>2021</option>
                            <option value='2022' {{ old('yearOfdisaster') == '2022' ? 'selected' : '' }}>2022</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Download</button>
                @if (Auth::user()->user_role == 1)
                    <a class="btn btn-outline-secondary" href="/admin/dashboard/brgy/{{ $barangay }}"
                        role="button">Cancel</a>
                @elseif (Auth::user()->user_role == 7)
                        <a class="btn btn-outline-secondary" href="/user/dashboard-lgu/brgy/{{ $barangay }}"
                            role="button">Cancel</a>

                @elseif (Auth::user()->user_role >= 4)
                    <a class="btn btn-outline-secondary" href="{{ route('user.dashboard.index') }}"
                        role="button">Cancel</a>
                @endif
                </form>

            </div>
        </div>
    </div>

@endsection
