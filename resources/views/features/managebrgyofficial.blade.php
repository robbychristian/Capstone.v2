@extends('dashboard.admin.home')

@section('title', '| Add Barangay Officials')
@section('sub-content')
    <div class="col-xl-10 col-log-9 col-md-8 mt-3">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-10">
                <div class="h3">Manage Barangay Officials</div>
            </div>
            <div class="col-2 mb-4">
                <a href="{{ route('admin.managebrgy_official.create') }}">
                    <button class="btn btn-primary">Add Barangay Official</button>
                </a>
            </div>
        </div>

        <div class="row mr-5 ml-2">
            <table class="table table-hover">
                <thead>
                    <tr class="table-active">
                        <th scope="col">Name</th>
                        <th scope="col">Barangay</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brgy_officials as $brgy_official)
                        <tr>
                            <td class="h3">{{ $brgy_official->name }}</td>
                            <td class="h3">{{ $brgy_official->brgy_loc }}</td>
                            <td>
                                <form action="/admin/managebrgy_official/{{ $brgy_official->id }}" method="POST">
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
    </div>

@endsection
