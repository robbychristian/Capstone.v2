@extends('layouts.master')

@section('title', '| Pending Announcements')
@section('content')
    <div class="container-fluid" style="color: black;">
        <h1 class="h3 mb-4 text-gray-800">Pending Announcements</h1>
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h3>Title</h3>
                    <div class="text-muted d-flex flex-column">
                        <p>Issued To:</p>
                        <p>Issued By:</p>
                        <p>Date Issued:</p>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit velit odio, vitae, cumque voluptatum
                        suscipit fugit iusto placeat atque veritatis odit. Distinctio non harum doloremque nam unde ab
                        delectus repellat?</p>




                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-success btn-icon-split mr-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Approve</span>
                        </button>
                        <button class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Disapprove</span>
                        </button>
                    </div>


                </li>

            </ul>
        </div>


    </div>
@endsection