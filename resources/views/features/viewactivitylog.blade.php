@extends('layouts.master')
@section('title', '| Audit Log')
@section('content')
    <div class="container-fluid" style="color: black">

        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm active mb-3" role="button"
            aria-pressed="true">Back</a>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Audit Logs</h1>
        </div>

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                @forelse($audits as $audit)

                    @if ($audit->user_id == null)
                        <div class="card-text">On {{ $audit->created_at }}, Admin[{{ $audit->ip_address }}]
                            <strong>{{ $audit->event }}</strong>
                            this record via {{ $audit->url }}/{{ $audit->auditable_id }}?
                        </div>
                    @else

                        <div class="card-text">On {{ $audit->created_at }}, User[{{ $audit->ip_address }}]
                            <strong>{{ $audit->event }}</strong>
                            this record via {{ $audit->url }}/{{ $audit->auditable_id }}?
                        </div>
                    @endif

                    @if ($audit->event == 'created')
                        <div class="table-responsive mt-3">
                            <table class="table table-sm table-borderless" style="color:#464646;" width="50%">
                                <thead>
                                    <tr>
                                        <th scope="col" style="color:#464646;" class="col-sm-3">Attribute</th>
                                        <th scope="col" style="color:#464646;" class="col-sm-9">Value</th>
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

                    @elseif ($audit->event == 'deleted')
                        <div class="table-responsive mt-3">
                            <table class="table table-sm table-borderless" style="color:#464646;" width="50%">
                                <thead>
                                    <tr>
                                        <th scope="col" style="color:#464646;" class="col-sm-3">Attribute</th>
                                        <th scope="col" style="color:#464646;" class="col-sm-9">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (json_decode($audit->old_values) as $attribute => $value)
                                        <tr>
                                            <th scope="row">{{ $attribute }}</th>
                                            <td>{{ $value }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    @elseif ($audit->event == 'updated')
                        <div class="changed-values">
                            <div class="row">
                                <div class="col-sm-6">
                                    @foreach (json_decode($audit->old_values) as $attribute => $value)
                                        @if ($value == null)
                                            The {{ $attribute }} has been
                                            modified
                                            from
                                            <strong><em>NULL</em></strong> <br>
                                        @else
                                            The {{ $attribute }} has been
                                            modified
                                            from
                                            <strong>{{ $value }}</strong> <br>
                                        @endif
                                    @endforeach

                                </div>
                                <div class="col-sm-6">
                                    @foreach (json_decode($audit->new_values) as $attribute => $value)
                                        to <strong>{{ $value }}</strong>. <br>
                                    @endforeach
                                </div>
                            </div>


                        </div>

                    @endif

                @empty
                    <div class="card-text">No logs</div>
                @endforelse
            </div>
        </div>

    </div>


@endsection
