@extends('layouts.master')
@section('title', '| Emergency Alert Message')
@section('content')
    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <div class="col-sm-12 col-md-8">
            <h1 class="h3 mb-4 text-gray-800">Emergency Alert Message</h1>
        </div>

        <div class="container mt-3">
            @if (Session::get('success'))
                <div class="alert alert-success mt-3 mb-3">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::get('error'))
                <div class="alert alert-danger mt-3 mb-3">
                    {{ Session::get('error') }}
                </div>
            @endif

            @if (Auth::user()->user_role === 1)
                <form action="/admin/emergencymessage" method="POST">
                @elseif (Auth::user()->user_role === 3)
                    <form action="/brgy_official/emergencymessage" method="POST">
            @endif
            @csrf

            <div class="form-group">
                <label><strong>Recipients</strong></label>
                <select class="form-control" id="exampleFormControlSelect1" name="recipients">
                    @if (count($numbers) > 0)
                        @foreach ($numbers as $number)
                            <option value="{{ $number->contact_no }}">{{ $number->contact_no }}</option>
                        @endforeach
                    @else
                        <option value="" disabled>There are no registered users. </option>
                    @endif
                </select>
                <small class="text-danger">@error('recipients')
                        {{ $message }}
                    @enderror</small>
            </div>

            <div class="form-group">
                <label><strong>Message</strong></label>
                <textarea name="message" id="" cols="30" rows="10" onkeyup="countChar(this)"
                    class="form-control">{{ old('message') }}</textarea>
                <p class="text-right text-muted" id="charNum">85</p>
                <small class="text-danger">@error('message')
                        {{ $message }}
                    @enderror</small>
            </div>
            <button class="btn btn-primary float-right ">Send</button>
            </form>
        </div>

        <script>
            function countChar(val) {
                var len = val.value.length;
                if (len >= 85) {
                    val.value = val.value.substring(0, 85);
                } else {
                    $('#charNum').text(85 - len);
                }
            }
        </script>

    </div>
@endsection
