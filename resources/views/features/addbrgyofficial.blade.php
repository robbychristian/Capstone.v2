@extends('layouts.master')

@section('title', '| Add Barangay Officials')

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
        <div class="row">
            <div class="col-10">
                <h1 class="h3 mb-4 text-gray-800">Add Barangay Official</h1>

            </div>
            <div class="col-2">
                <a class="btn btn-primary" href="/admin/managebrgy_official">Back</a>
            </div>
        </div>

        <div class="text-muted mb-5">Fields marked with an <span class="text-danger" style="font-size: 1rem">*</span> are
            required.</div>


        <form action="{{ route('admin.managebrgy_official.store') }}" method="POST" enctype="multipart/form-data"
            class="mt-4">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4 required">
                    <label class="control-label" for="inputfName">First Name</label>
                    <input name="fname" type="text" class="form-control" id="inputfName" value={{ old('fname') }}>
                    <small class="text-danger">@error('fname')
                            {{ $message }}
                        @enderror</small>
                </div>
                <div class="form-group col-md-4 required">
                    <label class="control-label" for="inputmName">Middle Name</label>
                    <input name="mname" type="text" class="form-control" id="inputmName" value={{ old('mname') }}>
                    <small class="text-danger">@error('mname')
                            {{ $message }}
                        @enderror</small>
                </div>

                <div class="form-group col-md-4 required">
                    <label class="control-label" for="inputlName">Last Name</label>
                    <input name="lname" type="text" class="form-control" id="inputlName" value={{ old('lname') }}>
                    <small class="text-danger">@error('lname')
                            {{ $message }}
                        @enderror</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 required">
                    <label class="control-label" for="inputAddress">Barangay Position</label>
                    <select name="brgy_pos" id="" class="form-control">
                        <option value="">Position</option>
                        <option value="Kagawad">Kagawad</option>
                        <option value="Responder">Responder</option>
                        <option value="Volunteer">Volunteer</option>
                        <option value="Barangay SK">Barangay SK</option>
                    </select>
                    <small class="text-danger">@error('address')
                            {{ $message }}
                        @enderror</small>
                </div>
                <div class="form-group col-md-4 required">
                    <label class="control-label" for="inputBrgy">Barangay</label>
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
                <div class="form-group col-md-4 required">
                    <label class="control-label" for="inputContactNum">Contact Number</label>
                    <input name="cnum" type="text" class="form-control" id="inputContactNum"
                        onkeypress="return onlyNumberKey(event)" maxlength="11" value={{ old('cnum') }}>
                    <small class="text-danger">@error('cnum')
                            {{ $message }}
                        @enderror</small>
                </div>
            </div>

            <div class="form-group required">
                <label class="control-label" for="inputEmail">Email</label>
                <input name="email" type="email" class="form-control" id="inputEmail" value={{ old('email') }}>
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
                    <input name="conf_pass" type="password" class="form-control" id="inputConfpw">
                    <small class="text-danger">@error('conf_pass')
                            {{ $message }}
                        @enderror</small>
                </div>
            </div>

            <div class="form-group required">
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
                <input name="cbox" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label control-label" for="exampleCheck1">I have read and agree to the <span
                        data-toggle="modal" data-target="#exampleModal"
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
