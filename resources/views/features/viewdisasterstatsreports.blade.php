@extends('dashboard.admin.home')

@section('title', '| View Disaster Statistical Reports')
@section('sub-content')
    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h3 class="mb-1">Disaster Statistical Reports</h3>

            </div>


            <!--ACCESSIBLE ONLY TO ADMIN/BRGY-->
            <div class="col-sm-12 col-md-4">
                <div class="row"></div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                    <a href="{{ route('brgy_official.stats.create') }}" class="btn btn-primary" 
                        role="button">Create a Disaster Statistical Reports</a>
                </div>
            </div>

        </div>

    </div>


@endsection
