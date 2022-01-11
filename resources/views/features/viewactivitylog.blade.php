@extends('layouts.master')
@section('title', '| Activity Log')
@section('content')
    <div class="container-fluid" style="color: black">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users Audit Logs</h1>
        </div>

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                @foreach ($audits as $audit)
                    <ul class="list-unstyled">

                        <li>On {{ $audit->created_at }}, {{ $audit->user_id }}[{{ $audit->ip_address }}] {{ $audit->event }} this record via {{ $audit->url }}
                            <ul>
                                <li>are unaffected by this style</li>
                                <li>will still show a bullet</li>
                                <li>and have appropriate left margin</li>
                            </ul>
                        </li>

                    </ul>

                @endforeach
            </div>
        </div>

    </div>


@endsection
