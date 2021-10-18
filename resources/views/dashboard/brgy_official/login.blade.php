@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col d-none d-lg-flex side-bar-img"
                style="background-color: #fffff; justify-content: center; align-items: center; height:85vh">
                <img src="{{ URL::asset('img/login-blue-img.png') }}" class="img-fluid login-img" alt="">
            </div>

            <div class="col-md-8 d-flex align-items-center justify-content-center side-bar-img"
                style="background-color:#004F91; height:85vh;">
                <div class="card" style="width: 40rem; p">
                    <div class="card-body shadow-card">
                        <h3 class="font-weight-bold mb-3" style="color:  #004F91">Login your Account</h3>
                        <hr>
                        @if (Session::get('fail'))
                            <div class="alert alert-warning">
                                <div class="h5">{{ $message }}</div>
                            </div>
                        @endif
                        <div class="container">
                            <form method="POST" action="{{ route('brgy_official.check') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right"
                                        style="font-size: 1rem;">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right"
                                        style="font-size: 1rem;">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn"
                                            style="background:#004F91; color:white; ">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link color" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
@endsection
