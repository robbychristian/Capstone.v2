@extends('dashboard.admin.home')

@section('title', '| Add Residents')
@section('sub-content')
    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <div class="row">
            <div class="col-10">
                <div class="h3">Add Residents</div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary">Back</button>
            </div>
        </div>

        @if (Auth::user()->user_role === 1)
            <form action="/admin/manageresident/" method="POST" class="mt-5">
        @elseif (Auth::user()->user_role === 3)
            <form action="/brgy_official/manageresident/" method="POST" class="mt-5">
        @endif
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputfName">First Name</label>
                    <input name="fname" type="text" class="form-control" id="inputfName">
                    <small class="text-danger">@error('fname')
                            {{ $message }}
                        @enderror</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputmName">Middle Name</label>
                    <input name="mname" type="text" class="form-control" id="inputmName">
                    <small class="text-danger">@error('mname')
                            {{ $message }}
                        @enderror</small>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputlName">Last Name</label>
                    <input name="lname" type="text" class="form-control" id="inputlName">
                    <small class="text-danger">@error('lname')
                            {{ $message }}
                        @enderror</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputAddress">Home Address</label>
                    <input name="address" type="text" class="form-control" id="inputAddress">
                    <small class="text-danger">@error('address')
                            {{ $message }}
                        @enderror</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputBrgy">Barangay</label>
                    @if (Auth::user()->user_role === 1)
                        <select name="brgy" id="inputBrgy" class="form-control">
                            <option selected>Choose your barangay</option>
                            <option>Barangay Santolan</option>
                            <option>Barangay 2</option>
                            <option>Barangay 3</option>
                            <option>Barangay 4</option>
                            <option>Barangay 5</option>
                        </select>
                        <small class="text-danger">@error('brgy')
                                {{ $message }}
                            @enderror</small>
                    @elseif (Auth::user()->user_role === 3)
                        <input name="brgy" type="text" class="form-control" id="inputAddress" value="Barangay Santolan" readonly>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputContactNum">Contact Number</label>
                    <input name="cnum" type="text" class="form-control" id="inputContactNum">
                    <small class="text-danger">@error('cnum')
                            {{ $message }}
                        @enderror</small>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputBday">Birthday</label>
                    <select name="mbday" id="inputBday" class="form-control">
                        <option selected>Month</option>
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
                        <label for="inputBday" style="color:white"></label>
                    </div>
                    <input name="dbday" type="text" class="form-control mt-2" id="inputBday" placeholder="Day">
                    <small class="text-danger">@error('dbday')
                            {{ $message }}
                        @enderror</small>
                </div>
                <div class="form-group col-md-2">
                    <div class="d-none d-xl-block d-lg-block d-md-block">
                        <label for="inputBday" style="color:white"></label>
                    </div>
                    <input name="ybday" type="text" class="form-control mt-2" id="inputBday" placeholder="Year">
                    <small class="text-danger">@error('ybday')
                            {{ $message }}
                        @enderror</small>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input name="email" type="email" class="form-control" id="inputEmail">
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
                <label for="inputUpload">Upload a valid ID</label>
                <div class="custom-file">
                    <input name="file" type="file" class="custom-file-input" id="inputGroupFile04"
                        aria-describedby="inputGroupFileAddon04">
                    <label class="custom-file-label" for="inputGroupFile04">Upload an image</label>
                </div>
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
