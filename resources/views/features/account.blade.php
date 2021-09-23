@if (Auth::user()->user_role === 4)
@extends('dashboard.user.home')

@section('title', '| Account')
@section('sub-content')

    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <h3 class="mb-4">Edit your Account</h3>
        <div class="card">
            <div class="card-body">
                
                <form action="">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputfName">First Name</label>
                            <input type="text" class="form-control" id="inputfName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputmName">Middle Name</label>
                            <input type="text" class="form-control" id="inputmName">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputlName">Last Name</label>
                            <input type="text" class="form-control" id="inputlName">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email Address</label>
                            <input type="text" class="form-control" id="inputEmail">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputContactNum">Contact Number</label>
                            <input type="text" class="form-control" id="inputContactNum">
                        </div>
                    </div>

                    <hr>
                    <h5 class="mb-3">Change your Password</h5>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCurrentPw">Current Password</label>
                            <input type="password" class="form-control" id="inputCurrentPw">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputNewPw">New Password</label>
                            <input type="password" class="form-control" id="inputNewPw">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputConfPw">Confirm New Password</label>
                            <input type="password" class="form-control" id="inputConfPw">
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