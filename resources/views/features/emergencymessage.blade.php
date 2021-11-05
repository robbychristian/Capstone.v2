@extends('dashboard.admin.home')
@section('title', '| Emergency Alert Message')
@section('sub-content')
    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <div class="container">

            <div class="col-sm-12 col-md-8">
                <h3 class="mb-1">Emergency Alert Message</h3>
            </div>

            @if (Auth::user()->user_role === 1)
                <form action="/admin/emergencymessage" method="POST">
                @elseif (Auth::user()->user_role === 3)
                    <form action="/brgy_official/emergencymessage" method="POST">
            @endif
            @csrf
            <!--<div class="form-group">
                <label><strong>Recipients</strong></label>
                <input type="text" name="recipients" class="form-control" value="{{ old('recipients') }}">
                <small class="text-danger">@error('recipients')
                        {{ $message }}
                    @enderror</small>
            </div> -->

            <div class="form-group">
                <label for="exampleFormControlSelect1">Recipients</label>
                <select class="form-control" id="exampleFormControlSelect1" name="recipients">
                    @foreach ($numbers as $number)
                    <option value="{{ $number->contact_no }}">{{ $number->contact_no }}</option>
                    @endforeach
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
