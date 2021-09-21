@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Your user role is
                    {{ Auth::user()->user_role }} (Admin)
                    
                    <a href="{{ route('admin.register_brgy') }}" class="badge badge-primary">To create barangay officials</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
