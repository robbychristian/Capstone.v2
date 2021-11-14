@extends('layouts.master')

@section('content')
    <!--
        <div class="container-fluid mt-3">
            @if (Auth::user()->email_verified_at === null)

                <div class="container">
                    <div class="card">
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                    class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div> -->

    <script>
        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode < 48 || ASCIICode > 57)
                return false;
            return true;
        }
    </script>
    <div class="container">
        <h3 class="mb-4">Edit your Account</h3>
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                @if (Auth::user()->user_role === 4)
                    <form action="/user/account/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                @method('PUT')
                <h5 class="mb-3">Profile Picture</h5>
                <div class="card mb-3 border-0">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ URL::asset('KabisigGit/storage/app/public/profile_pics/' . $user->id . '/' . $profile->profile_pic) }}"
                                alt="..." class="img-responsive" style="width: 100%; object-fit: cover; height: 300px;">
                            <!-- must be 375 x 300 px -->
                        </div>
                        <div class="col-md-8 ">
                            <div class="card-body d-flex flex-column">
                                <div class="form-group">
                                    <input name="file" class="form-control" type="file" id="formFile">
                                    @error('file')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <p class="card-text "><small class="text-muted">Accessible formats: jpg, png
                                        only</small></p>
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
                        <input type="text" onkeypress="return onlyNumberKey(event)" maxlength="11" name="cnum"
                            class="form-control @error('cnum') is-invalid @enderror" id="inputContactNum"
                            value="{{ $profile->contact_no }}">
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
                        <input type="password" name="new_pass" class="form-control  @error('new_pass') is-invalid @enderror"
                            id="inputNewPw">
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

                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
