@extends('dashboard.admin.home')

@section('title', '| Disaster Statistical Reports')
@section('sub-content')
    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h3 class="mb-1">Disaster Statistical Reports</h3>

            </div>

            @if (Auth::user()->user_role === 3 || Auth::user()->user_role === 1)
                <!--ACCESSIBLE ONLY TO ADMIN/BRGY-->
                <div class="col-sm-12 col-md-4">
                    <div class="row"></div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        @if (Auth::user()->user_role === 1)
                            <a href="#" class="btn btn-primary" role="button">Create a
                                Disaster Statistical Reports</a>

                        @elseif(Auth::user()->user_role === 3)
                            <a href="{{ route('brgy_official.stats.create') }}"class="btn btn-primary" role="button">Create a
                                Disaster Statistical Reports</a>
                        @endif
                    </div>
                </div>
            @endif

        </div>

    </div>


@endsection
