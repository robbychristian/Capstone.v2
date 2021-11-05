@extends('dashboard.admin.home')

@section('title', '| Disaster Statistical Reports')
@section('sub-content')
    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h3 class="mb-1">Disaster Statistical Reports</h3>
            </div>

            <!--ACCESSIBLE ONLY TO BRGY-->
            <div class="col-sm-12 col-md-4">
                <div class="row"></div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('brgy_official.stats.create') }}" class="btn btn-primary" role="button">Create a
                        Disaster Statistical Reports</a>
                </div>
            </div>
        </div>

        @if (count($disasterstats) > 0)
            <div class="table-responsive mt-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Month of Disaster</th>
                            <th scope="col">Year of Disaster</th>
                            <th scope="col">Barangay</th>
                            <th scope="col">Families Affected</th>
                            <th scope="col">Individuals Affected</th>
                            <th scope="col">Evacuees</th>
                            <th scope="col">Streets affected</th>
                            <th scope="col">Number of Families Affected in Street</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($disasterstats as $disaster)
                            <tr>
                                <th scope="row">{{ $disaster->created_at }}</th>
                                <td>{{ $disaster->month_disaster }}</td>
                                <td>{{ $disaster->year_disaster }}</td>
                                <td>{{ $disaster->barangay }}</td>
                                <td>{{ $disaster->families_affected }}</td>
                                <td>{{ $disaster->individuals_affected }}</td>
                                <td>
                                    @foreach ($affectedstreets->affectedStreets as $affectedstreet)
                                        {{ $affectedstreet->affected_streets }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($affectedstreets->affectedStreets as $affectedstreet)
                                        {{ $affectedstreet->number_families_affected }}
                                    @endforeach
                                </td>
                                <td><a href="/brgy_official/stats/{{ $disaster->id }}/edit">
                                        <button class="btn btn-success">Edit</button>
                                    </a></td>
                                <td><button class="btn btn-danger" type="submit">Delete</button></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @else
            <div class="card mt-3">
                <div class="card-body" style="font-weight: 400; font-size: 1rem;">
                    There are disaster statistical reports to show.
                </div>
            </div>
        @endif




    </div>


@endsection
