                                        @extends('layouts.master')
                                        @section('title', '| Disaster Statistical Report')
                                    @section('content')
                                        <script>
                                            $(document).ready(function() {

                                                $("#month").on('change', function() {
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
                                                    if (valueSelected == 'February') {
                                                        $("#day").empty()
                                                        $.each(febDays, function(key, value) {
                                                            $("#day").append($("<option></option>")
                                                                .attr("value", value).text(key))
                                                        })
                                                    } else if (valueSelected == 'January' || valueSelected == 'March' || valueSelected ==
                                                        'May' ||
                                                        valueSelected == 'July' || valueSelected == 'September' || valueSelected == 'November'
                                                    ) {
                                                        $("#day").empty()
                                                        $.each(day31, function(key, value) {
                                                            $("#day").append($("<option></option>")
                                                                .attr("value", value).text(key))
                                                        })
                                                    } else if (valueSelected == 'April' || valueSelected == 'June' || valueSelected ==
                                                        'August' ||
                                                        valueSelected == 'October' || valueSelected == 'December') {
                                                        $("#day").empty()
                                                        $.each(day30, function(key, value) {
                                                            $("#day").append($("<option></option>")
                                                                .attr("value", value).text(key))
                                                        })
                                                    } else {
                                                        $("#day").empty()
                                                        $("#day").append($("<option></option>")
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
                                        <div class="container-fluid" style="color: black">
                                            <h1 class="h3 mb-4 text-gray-800">Create Disaster Statistical Report</h1>
                                            <div class="card">
                                                <div class="card-body">

                                                    @if (Session::get('success'))
                                                        <div class="alert alert-success">
                                                            {{ Session::get('success') }}
                                                        </div>

                                                        <script>
                                                            swal("Success!", "Check your dashboard for data visualization!", "success");
                                                        </script>
                                                    @endif

                                                    @if (Auth::user()->user_role === 3)
                                                        <form action="{{ route('brgy_official.stats.store') }}" method="POST">

                                                        @elseif (Auth::user()->user_role === 1)
                                                            <form action="{{ route('admin.stats.store') }}" method="POST">
                                                    @endif
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Type of Disaster</label>
                                                            <select id="inputDisaster" class="form-control"
                                                                name="typeOfdisaster">
                                                                <option disabled hidden selected>Select Disaster</option>
                                                                <option value='Typhoon' {{ old('typeOfdisaster') == 'Typhoon' ? 'selected' : '' }}>Typhoon</option>
                                                                <option value='Flood' {{ old('typeOfdisaster') == 'Flood' ? 'selected' : '' }}>Flood</option>
                                                                <option value='Low Pressure Area' {{ old('typeOfdisaster') == 'Low Pressure Area' ? 'selected' : '' }}>Low Pressure Area</option>
                                                                <option value='Earthquake' {{ old('typeOfdisaster') == 'Earthquake' ? 'selected' : '' }}>Earthquake</option>
                                                                <option value='Landslide' {{ old('typeOfdisaster') == 'Landslide' ? 'selected' : '' }}>Landslide</option>
                                                                <option value='Others' {{ old('typeOfdisaster') == 'Others' ? 'selected' : '' }}>Others</option>
                                                            </select>
                                                            <small class="text-danger">@error('typeOfdisaster')
                                                                    {{ $message }}
                                                                @enderror</small>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" name="nameOfdisaster"
                                                                value="{{ old('nameOfdisaster') }}">
                                                            <small id="nameOfDisaster" class="form-text text-muted">Indicate if
                                                                applicable.</small>
                                                            <small class="text-danger">@error('nameOfdisaster')
                                                                    {{ $message }}
                                                                @enderror</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-2">
                                                            <label for="inputDay">Date</label>
                                                            <select id="month" class="form-control" name="monthOfdisaster">
                                                                <option disabled hidden selected>Select Month</option>
                                                                <option value='January'
                                                                    {{ old('monthOfdisaster') == 'January' ? 'selected' : '' }}>
                                                                    January</option>
                                                                <option value='February'
                                                                    {{ old('monthOfdisaster') == 'February' ? 'selected' : '' }}>
                                                                    February</option>
                                                                <option value='March'
                                                                    {{ old('monthOfdisaster') == 'March' ? 'selected' : '' }}>
                                                                    March
                                                                </option>
                                                                <option value='April'
                                                                    {{ old('monthOfdisaster') == 'April' ? 'selected' : '' }}>
                                                                    April
                                                                </option>
                                                                <option value='May'
                                                                    {{ old('monthOfdisaster') == 'May' ? 'selected' : '' }}>
                                                                    May
                                                                </option>
                                                                <option value='June'
                                                                    {{ old('monthOfdisaster') == 'June' ? 'selected' : '' }}>
                                                                    June
                                                                </option>
                                                                <option value='July'
                                                                    {{ old('monthOfdisaster') == 'July' ? 'selected' : '' }}>
                                                                    July
                                                                </option>
                                                                <option value='August'
                                                                    {{ old('monthOfdisaster') == 'August' ? 'selected' : '' }}>
                                                                    August
                                                                </option>
                                                                <option value='September'
                                                                    {{ old('monthOfdisaster') == 'September' ? 'selected' : '' }}>
                                                                    September</option>
                                                                <option value='October'
                                                                    {{ old('monthOfdisaster') == 'October' ? 'selected' : '' }}>
                                                                    October</option>
                                                                <option value='November'
                                                                    {{ old('monthOfdisaster') == 'November' ? 'selected' : '' }}>
                                                                    November</option>
                                                                <option value='December'
                                                                    {{ old('monthOfdisaster') == 'December' ? 'selected' : '' }}>
                                                                    December</option>
                                                            </select>
                                                            <small class="text-danger">@error('monthOfdisaster')
                                                                    {{ $message }}
                                                                @enderror</small>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputDay" style="color:white"></label>
                                                            <select id="day" class="form-control mt-2" id="inputDay"
                                                                placeholder="Day" name="dayOfdisaster"
                                                                value="{{ old('dayOfdisaster') }}">
                                                                <option disabled hidden selected>Select Day</option>
                                                            </select>

                                                            <small class="text-danger">@error('dayOfdisaster')
                                                                    {{ $message }}
                                                                @enderror</small>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputYear" style="color:white"></label>
                                                            <input type="text" class="form-control mt-2" id="inputYear"
                                                                placeholder="Year" name="yearOfdisaster"
                                                                value="{{ old('yearOfdisaster') }}">
                                                            <small class="text-danger">@error('yearOfdisaster')
                                                                    {{ $message }}
                                                                @enderror</small>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Barangay</label>
                                                            @if (Auth::user()->user_role === 1)
                                                                <select id="inputBrgy" class="form-control" name="barangay"
                                                                    value="{{ old('barangay') }}">
                                                                    @foreach ($barangays as $barangay)
                                                                        <option disabled hidden selected>Select Barangay
                                                                        </option>
                                                                        <option value='{{ $barangay->brgy_loc }}'
                                                                            {{ old('barangay') == $barangay->brgy_loc ? 'selected' : '' }}>
                                                                            {{ $barangay->brgy_loc }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <small class="text-danger">@error('barangay')
                                                                        {{ $message }}
                                                                    @enderror</small>
                                                            @elseif(Auth::user()->user_role === 3)
                                                                <input name="barangay" type="text" class="form-control"
                                                                    id="inputAddress" value="{{ Auth::user()->brgy_loc }}"
                                                                    readonly>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label>Total Number of Families Affected</label>
                                                            <input type="text" class="form-control" name="familiesAffected"
                                                                value="{{ old('familiesAffected') }}"
                                                                onkeypress="return onlyNumberKey(event)">
                                                            <small class="text-danger">@error('familiesAffected')
                                                                    {{ $message }}
                                                                @enderror</small>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Total Number of Individuals Affected</label>
                                                            <input type="text" class="form-control" name="individualsAffected"
                                                                value="{{ old('individualsAffected') }}"
                                                                onkeypress="return onlyNumberKey(event)">
                                                            <small class="text-danger">@error('individualsAffected')
                                                                    {{ $message }}
                                                                @enderror</small>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Total Number of Evacuees</label>
                                                            <input type="text" class="form-control" name="evacuees"
                                                                value="{{ old('evacuees') }}"
                                                                onkeypress="return onlyNumberKey(event)">
                                                            <small class="text-danger">@error('evacuees')
                                                                    {{ $message }}
                                                                @enderror</small>
                                                        </div>
                                                    </div>


                                                    <div id="dynamicAddRemove">
                                                        <div class="form-row">
                                                            <div class="form-group col-12 col-md-4">
                                                                <label for="">Affected Streets</label>
                                                                <input type="text" name="addMoreInputFields[0][street]"
                                                                    class="form-control" />
                                                                <small
                                                                    class="text-danger">@error('addMoreInputFields.*.street')
                                                                        {{ $message }}
                                                                    @enderror</small>
                                                            </div>

                                                            <div class="form-group col-12 col-md-4">
                                                                <label for="">Number of Families Affected</label>
                                                                <input type="text" name="addMoreInputFields[0][families]"
                                                                    class="form-control"
                                                                    onkeypress="return onlyNumberKey(event)" />
                                                                <small
                                                                    class="text-danger">@error('addMoreInputFields.*.families')
                                                                        {{ $message }}
                                                                    @enderror</small>
                                                            </div>
                                                            <div class="form-group col-6 col-md-4">
                                                                <label for="">Action</label>
                                                                <button type="button" name="add" id="dynamic-ar"
                                                                    class="btn btn-outline-primary form-control">Add
                                                                    Street</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Submit Data</button>
                                                    </form>

                                                </div>
                                            </div>


                                        </div>

                                        <script type="text/javascript">
                                            var i = 0;
                                            $("#dynamic-ar").click(function() {
                                                ++i;
                                                $("#dynamicAddRemove").append(
                                                    '<div class="form-row" id="parent"><div class="form-group col-12 col-md-4"><input type="text" name="addMoreInputFields[' +
                                                    i +
                                                    '][street]" class="form-control" /> <small class="text-danger">                    @error('addMoreInputFields.*.street'){{ $message }}@enderror</small></div><div class="form-group col-12 col-md-4"> <input type = "text" name = "addMoreInputFields[' +
                                                    i +
                                                    '][families]" class = "form-control"/> <small class="text-danger">                            @error('addMoreInputFields.*.families'){{ $message }}@enderror</small></div> <div class = "form-group col-6 col-md-4" ><button type = "button" name = "add" id = "dynamic-ar" class="btn btn-outline-danger form-control remove-input-field">Delete </button> </div></div>'
                                                );
                                            });
                                            $(document).on('click', '.remove-input-field', function() {
                                                $(this).parents('#parent').remove();
                                            });
                                        </script>
                                    @endsection
