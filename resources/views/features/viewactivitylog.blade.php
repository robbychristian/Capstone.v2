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


                        <table class="table table-borderless" style="color:#464646;">
                            <thead>
                                <tr style="color:#464646;">
                                    <th scope="col">Attribute</th>
                                    <th scope="col">Old Value</th>
                                    <th scope="col">New Value</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (json_decode($audit->old_values) as $attribute => $value)
                                    <tr>
                                        <td>
                                            {{ $attribute }}
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach (json_decode($audit->old_values) as $attribute => $value)
                                    <tr>
                                        @if ($value == null)
                                            <td>
                                                <strong><em>NULL</em></strong>
                                            </td>
                                        @else
                                            <td>
                                                <strong>{{ $value }}</strong>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                @foreach (json_decode($audit->new_values) as $attribute => $value)
                                    <tr>
                                        <td><strong>{{ $value }}</strong>. <br></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @endif

                @empty
                    <div class="card-text">No logs</div>
                @endforelse
            </div>
        </div>

    </div>


@endsection
