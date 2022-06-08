@extends('admin.layouts.main')
@section('content')
    <div class="row justify-content-md-center">

        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon icon-shape icon-md icon-shape-blue rounded mr-4 mr-sm-0"><span
                                    class="fas fa-chart-line"></span></div>
                            <div class="d-sm-none">
                                <h2 class="h5">Assigned Conflict Requests</h2>
                                <h3 class="mb-1">{{ $assigned }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Assigned Conflict Requests</h2>
                                <h3 class="mb-1">{{ $assigned }}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon icon-shape icon-md icon-shape-secondary rounded mr-4"><span
                                    class="fas fa-cash-register"></span></div>
                            <div class="d-sm-none">
                                <h2 class="h5">Rejected Conflict Requests</h2>
                                <h3 class="mb-1">{{ $rejected }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Rejected Conflict Requests</h2>
                                <h3 class="mb-1">{{ $rejected }}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon icon-shape icon-md icon-shape-blue rounded mr-4 mr-sm-0"><span
                                    class="fas fa-chart-line"></span></div>
                            <div class="d-sm-none">
                                <h2 class="h5">Calendar Events</h2>
                                <h3 class="mb-1">{{ $calendar_events }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Calendar Events</h2>
                                <h3 class="mb-1">{{ $calendar_events }}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
