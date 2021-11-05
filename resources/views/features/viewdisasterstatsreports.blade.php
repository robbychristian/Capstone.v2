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

        @if (Session::get('success'))
            <div class="alert alert-success mt-3">
                {{ Session::get('success') }}
            </div>

        @endif

        @if (count($disasterstats) > 0)
            <div class="table-responsive mt-5">
                <table class="table table-hover">
                    <thead style="background-color: #004f91;">
                        <tr>
                            <th scope="col" style="color: white;">Created At</th>
                            <th scope="col" style="color: white;">Month of Disaster</th>
                            <th scope="col" style="color: white;">Year of Disaster</th>
                            <th scope="col" style="color: white;">Type of Disaster</th>
                            <th scope="col" style="color: white;">Barangay</th>
                            <th scope="col" style="color: white;">Families Affected</th>
                            <th scope="col" style="color: white;">Individuals Affected</th>
                            <th scope="col" style="color: white;">Evacuees</th>
                            <th scope="col" style="color: white;" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($disasterstats as $disaster)
                            <tr>
                                <th scope="row">{{ date('F d, Y', strtotime($disaster->created_at)) }}</th>
                                <td>{{ $disaster->month_disaster }}</td>
                                <td>{{ $disaster->year_disaster }}</td>
                                <td>{{ $disaster->type_disaster }}</td>
                                <td>{{ $disaster->barangay }}</td>
                                <td>{{ $disaster->families_affected }}</td>
                                <td>{{ $disaster->individuals_affected }}</td>
                                <td>{{ $disaster->evacuees }}</td>


                                <td><a href="/brgy_official/stats/{{ $disaster->id }}/edit">
                                        <button class="btn btn-success">Edit</button>
                                    </a></td>
                                <td>
                                    <form action="/brgy_official/stats/{{ $disaster->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
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
