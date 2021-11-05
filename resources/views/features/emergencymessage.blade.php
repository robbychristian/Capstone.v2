@extends('dashboard.admin.home')
@section('title', '| Emergency Alert Message')
@section('sub-content')
<div class="col-xl-10 col-lg-9 col-md-8 mt-3">
    <div class="container">
        @if (Auth::user()->user_role === 1)
            <form action="/admin/emergencymessage" method="POST">
            @elseif (Auth::user()->user_role === 3)
                <form action="/brgy_official/emergencymessage" method="POST">
        @endif
        @csrf
        <div class="form-group">
            <label><strong>Recipients</strong></label>
            <input type="text" name="recipients" class="form-control" value="{{ old('recipients') }}">
            <small class="text-danger">@error('recipients')
                    {{ $message }}
                @enderror</small>
        </div>

        <div class="form-group">
            <label><strong>Message</strong></label>
            <textarea name="message" id="" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
            <small class="text-danger">@error('message')
                    {{ $message }}
                @enderror</small>
        </div>
        <button class="btn btn-primary float-right ">Send</button>
        </form>
    </div>

</div>
@endsection
