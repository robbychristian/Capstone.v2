@extends('layouts.master')
@section('title', '| Add Residents')
@section('content')
    <script>
        $(document).ready(function() {

            $("#mbday").on('change', function() {
                const optionSelected = $("option:selected", this)
                var valueSelected = this.value
                var febDays = {
                    "1": "1",
                    "2": "2",
                    "3": "3",
                    "4": "4",
                    "5": "5",
                    "6": "6",
                    "7": "7",
                    "8": "8",
                    "9": "9",
                    "10": "10",
                    "11": "11",
                    "12": "12",
                    "13": "13",
                    "14": "14",
                    "15": "15",
                    "16": "16",
                    "17": "17",
                    "18": "18",
                    "19": "19",
                    "20": "20",
                    "21": "21",
                    "22": "22",
                    "23": "23",
                    "24": "24",
                    "25": "25",
                    "26": "26",
                    "27": "27",
                    "28": "28",
                }
                var day30 = {
                    "1": "1",
                    "2": "2",
                    "3": "3",
                    "4": "4",
                    "5": "5",
                    "6": "6",
                    "7": "7",
                    "8": "8",
                    "9": "9",
                    "10": "10",
                    "11": "11",
                    "12": "12",
                    "13": "13",
                    "14": "14",
                    "15": "15",
                    "16": "16",
                    "17": "17",
                    "18": "18",
                    "19": "19",
                    "20": "20",
                    "21": "21",
                    "22": "22",
                    "23": "23",
                    "24": "24",
                    "25": "25",
                    "26": "26",
                    "27": "27",
                    "28": "28",
                    "29": "29",
                    "30": "30",
                }
                var day31 = {
                    "1": "1",
                    "2": "2",
                    "3": "3",
                    "4": "4",
                    "5": "5",
                    "6": "6",
                    "7": "7",
                    "8": "8",
                    "9": "9",
                    "10": "10",
                    "11": "11",
                    "12": "12",
                    "13": "13",
                    "14": "14",
                    "15": "15",
                    "16": "16",
                    "17": "17",
                    "18": "18",
                    "19": "19",
                    "20": "20",
                    "21": "21",
                    "22": "22",
                    "23": "23",
                    "24": "24",
                    "25": "25",
                    "26": "26",
                    "27": "27",
                    "28": "28",
                    "29": "29",
                    "30": "30",
                    "31": "31",
                }
                var option = $('<option></option>').attr("value", "option value").text("Text");
                if (valueSelected == '2') {
                    $("#dbday").empty()
                    $.each(febDays, function(key, value) {
                        $("#dbday").append($("<option></option>")
                            .attr("value", value).text(key))
                    })
                } else if (valueSelected == '1' || valueSelected == '3' || valueSelected == '5' ||
                    valueSelected == '7' || valueSelected == '9' || valueSelected == '11') {
                    $("#dbday").empty()
                    $.each(day31, function(key, value) {
                        $("#dbday").append($("<option></option>")
                            .attr("value", value).text(key))
                    })
                } else if (valueSelected == '4' || valueSelected == '6' || valueSelected == '8' ||
                    valueSelected == '10' || valueSelected == '12') {
                    $("#dbday").empty()
                    $.each(day30, function(key, value) {
                        $("#dbday").append($("<option></option>")
                            .attr("value", value).text(key))
                    })
                } else {
                    $("#dbday").empty()
                    $("#dbday").append($("<option></option>")
                        .attr("value", "").text("Day"))
                }
            })
        })

        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode < 48 || ASCIICode > 57)
                return false;
            return true;
        }
    </script>

    <div class="container-fluid" style="color: black;">
        <div class="row">
            <div class="col-10">
                <h1 class="h3 mb-4 text-gray-800">Add Resident</h1>

            </div>
            <div class="col-2">

                @if (Auth::user()->user_role === 1)
                    <a class="btn btn-primary" href="/admin/manageresident" role="button">Back</a>
                @elseif (Auth::user()->user_role === 3)
                    <a class="btn btn-primary" href="/brgy_official/manageresident" role="button">Back</a>
                @endif
            </div>
        </div>

        @if (Auth::user()->user_role === 1)
            <form action="{{ route('admin.manageresident.store') }}" method="POST" class="mt-5"
                enctype="multipart/form-data">
            @elseif (Auth::user()->user_role === 3)
                <form action="{{ route('brgy_official.manageresident.store') }}" method="POST" class="mt-5"
                    enctype="multipart/form-data">
        @endif
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputfName">First Name</label>
                <input name="fname" type="text" class="form-control" id="inputfName" value={{ old('fname') }}>
                <small class="text-danger">@error('fname')
                        {{ $message }}
                    @enderror</small>
            </div>
            <div class="form-group col-md-4">
                <label for="inputmName">Middle Name</label>
                <input name="mname" type="text" class="form-control" id="inputmName" value={{ old('mname') }}>
                <small class="text-danger">@error('mname')
                        {{ $message }}
                    @enderror</small>
            </div>

            <div class="form-group col-md-4">
                <label for="inputlName">Last Name</label>
                <input name="lname" type="text" class="form-control" id="inputlName" value={{ old('lname') }}>
                <small class="text-danger">@error('lname')
                        {{ $message }}
                    @enderror</small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="inputAddress">Home Address</label>
                <input name="address" type="text" class="form-control" id="inputAddress" value={{ old('address') }}>
                <small class="text-danger">@error('address')
                        {{ $message }}
                    @enderror</small>
            </div>
            <div class="form-group col-md-4">
                <label for="inputBrgy">Barangay</label>
                @if (Auth::user()->user_role === 1)
                    <select name="brgy" id="inputBrgy" class="form-control">
                        <option value="">Barangay</option>
                        <option value='Barangay Dela Paz'>Barangay Dela Paz</option>
                        <option value='Barangay Manggahan'>Barangay Manggahan</option>
                        <option value='Barangay Maybunga'>Barangay Maybunga</option>
                        <option value='Barangay Rosario'>Barangay Rosario</option>
                        <option value='Barangay Santolan'>Barangay Santolan</option>
                    </select>
                    <small class="text-danger">@error('brgy')
                            {{ $message }}
                        @enderror</small>
                @elseif (Auth::user()->user_role === 3)
                    <input name="brgy" type="text" class="form-control" id="inputAddress"
                        value="{{ Auth::user()->brgy_loc }}" readonly>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputContactNum">Contact Number</label>
                <input name="cnum" type="text" class="form-control" id="inputContactNum"
                    onkeypress="return onlyNumberKey(event)" maxlength="11" value={{ old('cnum') }}>
                <small class="text-danger">@error('cnum')
                        {{ $message }}
                    @enderror</small>
            </div>
            <div class="form-group col-md-2">
                <label for="inputBday">Birthday</label>
                <select name="mbday" id="mbday" class="form-control" value="{{ old('mbday') }}">
                    <option selected disabled>Month</option>
                    <option value='1'>January</option>
                    <option value='2'>February</option>
                    <option value='3'>March</option>
                    <option value='4'>April</option>
                    <option value='5'>May</option>
                    <option value='6'>June</option>
                    <option value='7'>July</option>
                    <option value='8'>August</option>
                    <option value='9'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>
                </select>
                <small class="text-danger">@error('mbday')
                        {{ $message }}
                    @enderror</small>
            </div>
            <div class="form-group col-md-2">
                <div class="d-none d-xl-block d-lg-block d-md-block">
                    <label for="inputBday" style="color:white">asdasd</label>
                </div>
                <select name="dbday" id="dbday" class="form-control" value="{{ old('dbday') }}">
                    <option selected disabled>Day</option>
                </select>
                <small class="text-danger">@error('dbday')
                        {{ $message }}
                    @enderror</small>
            </div>
            <div class="form-group col-md-2">
                <div class="d-none d-xl-block d-lg-block d-md-block">
                    <label for="inputBday" style="color:white"></label>
                </div>
                <input name="ybday" type="text" class="form-control mt-2" id="inputBday" placeholder="Year"
                    value="{{ old('ybday') }}">
                <small class="text-danger">@error('ybday')
                        {{ $message }}
                    @enderror</small>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input name="email" type="email" class="form-control" id="inputEmail" value={{ old('email') }}>
            <small class="text-danger">@error('email')
                    {{ $message }}
                @enderror</small>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword">Password</label>
                <input name="pass" type="password" class="form-control" id="inputPassword">
                <small class="text-danger">@error('pass')
                        {{ $message }}
                    @enderror</small>
            </div>
            <div class="form-group col-md-6">
                <label for="inputConfpw">Confirm Password</label>
                <input name="conf_pass" type="password" class="form-control" id="inputConfpw">
                <small class="text-danger">@error('conf_pass')
                        {{ $message }}
                    @enderror</small>
            </div>
        </div>

        <div class="form-group">
            <label for="inputUpload">Upload your Profle Picture</label>
            <input name="file" class="form-control" type="file" id="formFile">
            @error('file')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="form-group form-check">
            <input name="cbox" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">I have read and agree to the <span
                    style="text-decoration: underline; color: blue; cursor: pointer;">terms and
                    conditions
                </span></label>
            <small class="text-danger">@error('cbox')
                    {{ $message }}
                @enderror</small>
        </div>

        <button name="" type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>


@endsection
