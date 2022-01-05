@extends('layouts.app')

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
   
    @php
    $barangays = DB::table('barangays')
        ->select('brgy_loc')
        ->where('is_added', 1)
        ->get();

        echo vardump($barangays);
    @endphp



    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-card" style="margin: 2rem 0rem;">
                    <div class="card-body">

                        <h3 class="font-weight-bold mb-3" style="color:  #004F91">Create your account</h3>
                        <hr>

                        <div class="text-muted mb-2">Fields marked with an <span class="text-danger"
                                style="font-size: 1rem">*</span> are
                            required.</div>
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4 required">
                                    <label class="control-label" for="inputfName">First Name</label>
                                    <input name="fname" type="text" class="form-control" id="inputfName"
                                        value="{{ old('fname') }}">
                                    <small class="text-danger">@error('fname')
                                            {{ $message }}
                                        @enderror</small>
                                </div>
                                <div class="form-group col-md-4 required">
                                    <label class="control-label" for="inputmName">Middle Name</label>
                                    <input name="mname" type="text" class="form-control" id="inputmName"
                                        value="{{ old('mname') }}">
                                    <small class="text-danger">@error('mname')
                                            {{ $message }}
                                        @enderror</small>
                                </div>

                                <div class="form-group col-md-4 required">
                                    <label class="control-label" for="inputlName">Last Name</label>
                                    <input name="lname" type="text" class="form-control" id="inputlName"
                                        value="{{ old('lname') }}">
                                    <small class="text-danger">@error('lname')
                                            {{ $message }}
                                        @enderror</small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8 required">
                                    <label class="control-label" for="inputAddress">Home Address</label>
                                    <input name="home_add" type="text" class="form-control" id="inputAddress"
                                        value="{{ old('home_add') }}">
                                    <small class="text-danger">@error('home_add')
                                            {{ $message }}
                                        @enderror</small>
                                </div>
                                <div class="form-group col-md-4 required">
                                    <label class="control-label" for="inputBrgy">Barangay</label>
                                    <select name="brgy" id="inputBrgy" class="form-control" value="{{ old('brgy') }}">


                                    </select>
                                    <small class="text-danger">@error('brgy')
                                            {{ $message }}
                                        @enderror</small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 required">
                                    <label class="control-label" for="inputContactNum">Contact Number</label>
                                    <input name="cnum" type="text" class="form-control" id="inputContactNum"
                                        onkeypress="return onlyNumberKey(event)" maxlength="11"
                                        value="{{ old('cnum') }}">
                                    <small class="text-danger">@error('cnum')
                                            {{ $message }}
                                        @enderror</small>
                                </div>
                                <div class="form-group col-md-2 required">
                                    <label class="control-label" for="inputBday">Birthday</label>
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
                                <div class="form-group col-md-2 required">
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
                                <div class="form-group col-md-2 required">
                                    <div class="d-none d-xl-block d-lg-block d-md-block">
                                        <label for="inputBday" style="color:white"></label>
                                    </div>
                                    <input name="ybday" type="text" class="form-control mt-2" id="inputBday"
                                        placeholder="Year" value="{{ old('ybday') }}">
                                    <small class="text-danger">@error('ybday')
                                            {{ $message }}
                                        @enderror</small>
                                </div>
                            </div>

                            <div class="form-group required">
                                <label class="control-label" for="inputEmail">Email</label>
                                <input name="email" type="email" class="form-control" id="inputEmail"
                                    value="{{ old('email') }}">
                                <small class="text-danger">@error('email')
                                        {{ $message }}
                                    @enderror</small>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 required">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <input name="pass" type="password" class="form-control" id="inputPassword">
                                    <small class="text-muted">Must be 8 and above characters long.</small>
                                    <small class="text-danger">@error('pass')
                                            {{ $message }}
                                        @enderror</small>
                                </div>
                                <div class="form-group col-md-6 required">
                                    <label class="control-label" for="inputConfpw">Confirm Password</label>
                                    <input name="cpass" type="password" class="form-control" id="inputConfpw">
                                    <small class="text-danger">@error('cpass')
                                            {{ $message }}
                                        @enderror</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="inputUpload">Upload your Valid ID</label>
                                <input name="validID" class="form-control" type="file" id="formFile">
                                <small class="text-muted">Accessible formats: jpg, png, jpeg,
                                    only</small>
                                @error('validID')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="inputUpload">Upload your Profle Picture</label>
                                <input name="file" class="form-control" type="file" id="formFile">
                                <small class="text-muted">Accessible formats: jpg, png, jpeg,
                                    only</small>
                                @error('file')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>


                            <div class="form-group form-check required">
                                <input name="cbox" type="checkbox" class="form-check-input" id="checkbox">
                                <label class="form-check-label control-label" for="exampleCheck1">I have read and agree to
                                    the <span data-toggle="modal" data-target="#exampleModal"
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
                </div>
            </div>

            <div class="col d-none d-lg-flex"
                style="background-color: #004F91; justify-content: center; align-items: center; height:85vh;">
                <img src="{{ URL::asset('img/login-img.png') }}" class="img-fluid login-img" alt="">
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small teal">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 text-light" style="background-color: #004F91;">© 2021 Copyright:
            QuadCore</div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-gray-900" style="text-align: justify">
                    <div class="terms-title text-center font-weight-bold" style="font-size: 1.3rem;">
                        KABISIG DIGITAL PRIVACY POLICY
                    </div>
                    <div class="1-paragraph text-center">
                        This informs you of our policies regarding the collection, use and disclosure of Personal
                        Information we
                        receive from users.
                        We use your Personal Information only for providing and improving the application. By using the
                        application, you agree to the collection and use of information in accordance with this policy.
                    </div>


                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Information Collection And Use</strong><br>
                            While using our application, we may ask you to provide us with certain personally identifiable
                            information that can be used to contact or identify you. Personally identifiable information may
                            include, but is not limited to your name, email address, contact number, birthday, residence
                            (barangay)
                            and your profile picture.
                        </li>
                        <li class="list-group-item">
                            <strong>Security</strong><br>
                            The security of your Personal Information is important to us, but remember that no method of
                            transmission over the Internet, or method of electronic storage, is 100% secure. While we strive
                            to use
                            commercially acceptable means to protect your Personal Information, we cannot guarantee its
                            absolute
                            security.
                        </li>
                    </ul>
                    <hr>

                    <div class="terms-title text-center font-weight-bold" style="font-size: 1.3rem;">
                        KABISIG TERMS OF USE
                    </div>
                    <div class="1-paragraph text-center">
                        <strong class="mt-2">PLEASE READ THESE TERMS OF USE CAREFULLY BEFORE USING THE
                            APPLICATION. </strong><br> <br>
                        Your access to and use of the Service is conditioned on your acceptance of and compliance
                        with these
                        Terms. These Terms apply to all visitors, users and others who access or use the Service.
                        By accessing or using the Service you agree to be bound by these Terms. If you disagree with
                        any
                        part of
                        the terms then you may not access the Service.
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Report</strong><br>
                            KaBisig allows you to submit, store, share and otherwise make available certain information,
                            text,
                            graphics or images. You are responsible for any information you share. Any type of fraud or sham
                            in submitting reports
                            will be
                            immediately blocked in submitting reports. Falsifying information especially with regards to
                            disasters
                            will only make things worse.
                        </li>
                        <li class="list-group-item">
                            <strong>Links To Other Web Sites</strong><br>
                            Our Service may contain links to third-party web sites or services that are not owned or
                            controlled by
                            admins of KaBisig.
                            The administrator of KaBisig has no control over, and assumes no responsibility for, the
                            content,
                            privacy policies, or practices of any third party web sites or services. You further acknowledge
                            and
                            agree that the administrator of KaBisig shall not be responsible or liable, directly or
                            indirectly, for
                            any damage or loss caused or alleged to be caused by or in connection with use of or reliance on
                            any
                            such content, goods or services available on or through any such web sites or services.
                        </li>
                        <li class="list-group-item"> <strong>Changes</strong><br>
                            We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If
                            there’s a
                            revision, we will try to provide at least 30 days notice prior to any new terms taking effect.
                            What
                            constitutes a material change will be determined at our sole discretion.
                        </li>
                        <li class="list-group-item"> <strong>Contact Us</strong><br>
                            If you have any questions about these Terms and Privacy Policy, please contact us.
                        </li>

                    </ul>



                </div>
            </div>
        </div>
    </div>

@endsection
