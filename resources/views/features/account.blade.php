@extends('dashboard.admin.home')
@if (Auth::user()->user_role === 4)

    @section('title', '| Account')
    @section('sub-content')

        <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
            <h3 class="mb-4">Edit your Account</h3>
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            
            <div class="card">
                <div class="card-body">
                    @if (Auth::user()->user_role === 4)
                        <form action="/user/account/{{ $user->id }}" method="POST">
                    @endif
                    @csrf
                    @method('PUT')
                    <h5 class="mb-3">Profile Picture</h5>
                    <div class="card mb-3 border-0">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="{{ asset('img/appmockup.png') }}" alt="..." class="img-responsive" style="width: 100%;
                            object-fit: cover;
                            height: 300px;"> <!-- must be 375 x 300 px -->
                          </div>
                          <div class="col-md-8 ">
                            <div class="card-body d-flex flex-column">
                                <div class="custom-file" style="margin-top: auto">
                                    <input name="file" type="file" class="custom-file-input" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label" for="inputGroupFile04">Upload an image</label>
                                </div>
                                <p class="card-text "><small class="text-muted">Accessible formats: jpg, png only</small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                    <h5 class="mb-3">Account Information</h5>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputfName">First Name</label>
                            <input type="text" name="fname" class="form-control @error('fname') is-invalid @enderror"
                                id="inputfName" value="{{ $user->first_name }}">
                            <small class="text-danger">@error('fname')
                                    {{ $message }}
                                @enderror</small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputmName">Middle Name</label>
                            <input type="text" name="mname" class="form-control @error('mname') is-invalid @enderror"
                                id="inputmName" value="{{ $profile->middle_name }}">
                            <small class="text-danger">@error('mname')
                                    {{ $message }}
                                @enderror</small>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputlName">Last Name</label>
                            <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror"
                                id="inputlName" value="{{ $user->last_name }}">
                            <small class="text-danger">@error('lname')
                                    {{ $message }}
                                @enderror</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email Address</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="inputEmail" value="{{ $user->email }}" readonly>
                            <small class="text-danger">@error('email')
                                    {{ $message }}
                                @enderror</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputContactNum">Contact Number</label>
                            <input type="text" name="cnum" class="form-control @error('cnum') is-invalid @enderror"
                                id="inputContactNum" value="{{ $profile->contact_no }}">
                            <small class="text-danger">@error('cnum')
                                    {{ $message }}
                                @enderror</small>
                        </div>
                    </div>

                    <hr>
                    <h5 class="mb-3">Change your Password</h5>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCurrentPw">Current Password</label>
                            <input type="password" name="curr_pass"
                                class="form-control @error('curr_pass') is-invalid @enderror" id="inputCurrentPw">
                            <small class="text-danger">@error('curr_pass')
                                    {{ $message }}
                                @enderror</small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputNewPw">New Password</label>
                            <input type="password" name="new_pass"
                                class="form-control  @error('new_pass') is-invalid @enderror" id="inputNewPw">
                            <small class="text-danger">@error('new_pass')
                                    {{ $message }}
                                @enderror</small>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputConfPw">Confirm New Password</label>
                            <input type="password" name="conf_pass"
                                class="form-control @error('conf_pass') is-invalid @enderror" id="inputConfPw">
                            <small class="text-danger">@error('conf_pass')
                                    {{ $message }}
                                @enderror</small>
                        </div>
                    </div>
                    <div class=" d-grid gap-2 d-md-block">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <a class="btn btn-outline-secondary" href="#" role="button">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
@endif


@if (Auth::user()->user_role === 3)

    @section('title', '| Account')
    @section('sub-content')

        <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
            <h3 class="mb-4">Edit your Account</h3>
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="/brgy_official/account/{{ $brgy_official->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputfName">First Name</label>
                                <input type="text" name="fname" class="form-control @error('fname') is-invalid @enderror"
                                    id="inputfName">
                                <small class="text-danger">@error('fname')
                                        {{ $message }}
                                    @enderror</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputmName">Middle Name</label>
                                <input type="text" name="mname" class="form-control @error('mname') is-invalid @enderror"
                                    id="inputmName">
                                <small class="text-danger">@error('mname')
                                        {{ $message }}
                                    @enderror</small>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputlName">Last Name</label>
                                <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror"
                                    id="inputlName">
                                <small class="text-danger">@error('lname')
                                        {{ $message }}
                                    @enderror</small>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail">Email Address</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                    id="inputEmail">
                                <small class="text-danger">@error('email')
                                        {{ $message }}
                                    @enderror</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputContactNum">Position</label>
                                <input type="text" name="position" class="form-control" id="inputContactNum"
                                    value="{{ Auth::user()->brgy_position }}" disabled>
                            </div>
                        </div>

                        <hr>
                        <h5 class="mb-3">Change your Password</h5>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCurrentPw">Current Password</label>
                                <input type="password" name="curr_pass"
                                    class="form-control @error('curr_pass') is-invalid @enderror" id="inputCurrentPw">
                                <small class="text-danger">@error('curr_pass')
                                        {{ $message }}
                                    @enderror</small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputNewPw">New Password</label>
                                <input type="password" name="new_pass"
                                    class="form-control @error('new_pass') is-invalid @enderror" id="inputNewPw">
                                <small class="text-danger">@error('new_pass')
                                        {{ $message }}
                                    @enderror</small>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputConfPw">Confirm New Password</label>
                                <input type="password" name="conf_pass"
                                    class="form-control @error('conf_pass') is-invalid @enderror" id="inputConfPw">
                                <small class="text-danger">@error('conf_pass')
                                        {{ $message }}
                                    @enderror</small>
                            </div>
                        </div>
                        <div class=" d-grid gap-2 d-md-block">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a class="btn btn-outline-secondary" href="#" role="button">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
@endif
