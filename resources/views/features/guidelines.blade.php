@extends('dashboard.user.home')

@section('title', '| Guidelines')
@section('sub-content')

    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <h3 class="mb-4">Guidelines</h3>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="-tab" data-toggle="tab"
                        href="#" role="tab" aria-controls=""
                        aria-selected=""></a>
                </li>
        </ul>
        <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade  active" id="" role="tabpanel"
                    aria-labelledby="-tab">

                    <div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-xs-12 col-lg-4">
                                <div class="row mb-3">
                                    <div class="col h4">BEFORE</div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col"></div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-lg-4">
                                <div class="row mb-3">
                                    <div class="col h4">DURING</div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col"></div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-lg-4">
                                <div class="row mb-3">
                                    <div class="col h4">AFTER</div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>

@endsection
