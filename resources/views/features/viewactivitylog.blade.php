@extends('layouts.master')
@section('title', '| Audit Log')
@section('content')
    <!---comments: continue on update event view and admin -->
    <div class="container-fluid" style="color: black">

        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm active mb-3" role="button"
            aria-pressed="true">Back</a>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Audit Logs</h1>
        </div>

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                @forelse($audits as $audit)
                    <div class="card-text">On {{ $audit->created_at }}, {{ $audit->first_name }}
                        {{ $audit->last_name }}[{{ $audit->ip_address }}] <strong>{{ $audit->event }}</strong>
                        this record via {{ $audit->url }}/{{ $audit->auditable_id }}?</div>
                    @if ($audit->event == 'created' || $audit->event == 'deleted')

                        <div class="container">
                            <ul class="list-group">
                                @foreach (json_decode($audit->new_values) as $attribute => $value)
                                    <li class="list-group-item"><strong>{{ $attribute }}:</strong> {{ $value }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif ($audit->created_at == 'updated')

                    @endif

                @empty
                    <div class="card-text">No logs</div>
                @endforelse
            </div>
        </div>

    </div>


@endsection
