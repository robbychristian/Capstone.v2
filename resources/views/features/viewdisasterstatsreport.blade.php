@extends('layouts.master')

@section('title', '| Disaster Statistical Reports')
@section('content')
    <div class="container-fluid" style="color: black;">
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm active mb-3" role="button"
            aria-pressed="true">Back</a>

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                {{ $disasterstats->id }}
               
            </div>
        </div>

    </div>


@endsection
