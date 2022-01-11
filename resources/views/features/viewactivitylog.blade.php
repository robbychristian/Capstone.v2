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
                        <!-- format: On 2022-01-11 17:46:18, Tine Manabs[111.125.109.69] created this record via https://kabisigapp.com/user/vulnerabilitymap/9? -->
                        <li>On {{ $audit->created_at }}, {{ $audit->first_name }}
                            {{ $audit->last_name }}[{{ $audit->ip_address }}] <strong>{{ $audit->event }}</strong>
                            this record via {{ $audit->url }}/{{ $audit->auditable_id }}?
                            <ul>
                                @foreach ($audit->new_values as $attribute => $values)
                                <li>{{ $attribute }}: {{ $values }}</li>
                                @endforeach
                               
                            </ul>
                        </li>

                    </ul>

                @endforeach
            </div>
        </div>

    </div>


@endsection
