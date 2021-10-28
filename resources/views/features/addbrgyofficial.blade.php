@extends('dashboard.admin.home')

@section('title', '| Add Barangay Officials')

@section('sub-content')

    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <div class="row">
            <div class="col-10">
                <div class="h3">Add Barangay Officials</div>
            </div>
            <div class="col-2">
                <a class="btn btn-primary" href="/admin/managebrgy_official">Back</a>
            </div>
        </div>
        <form action="{{ route('admin.managebrgy_official.store') }}" method="POST" class="mt-4">
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
                <div class="form-group col-md-4">
                    <label for="inputAddress">Barangay Position</label>
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
                        <input name="brgy" type="text" class="form-control" id="inputAddress" value="{{ Auth::user()->brgy_loc }}"
                            readonly>
                    @endif
                </div>
                    <div class="form-group col-md-4">
                    <label for="inputContactNum">Contact Number</label>
                    <input name="cnum" type="text" class="form-control" id="inputContactNum" value={{ old('cnum') }}>
                    <small class="text-danger">@error('cnum')
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
