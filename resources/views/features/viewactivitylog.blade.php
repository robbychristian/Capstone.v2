@extends('layouts.master')
@section('title', '| Activity Log')
@section('content')
    <div class="container-fluid" style="color: black">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users Audit Logs</h1>
        </div>

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                @forelse($audits as $audit)
                    <div class="card-text">On {{ $audit->created_at }}, {{ $audit->first_name }}
                        {{ $audit->last_name }}[{{ $audit->ip_address }}] <strong>{{ $audit->event }}</strong>
                        this record via {{ $audit->url }}/{{ $audit->auditable_id }}?</div>

                    <div class="table-responsive mt-3">
                        <table class="table table-sm" style="color: black;" width="50%">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Attribute</th>
                                    <th scope="col">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($audit->new_values) as $attribute => $value)
                                    <tr>
                                        <th scope="row">{{ $attribute }}</th>
                                        <td>{{ $value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @empty
                    <div class="card-text">No logs</div>

                @endforelse
            </div>
        </div>

    </div>


@endsection
