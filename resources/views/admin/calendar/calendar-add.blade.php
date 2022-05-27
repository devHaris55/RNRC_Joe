@extends('admin.layouts.main')
@section('content')
<style>
@media (max-width: 540px) {



.ml-4 {
    margin-left: 0 !important;
}
.rounded-circle {
    border-radius: 50% !important;
    display: none;
}
.sidebar-inner h2.h6 {
    display: none;
}
}

</style>
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_calendar')}}">Event-List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Event-Add</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Event Add</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-12 mb-4 ml-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-lg-12 col-sm-12">
                            <!-- Form -->
                                <!-- @if(Session::has('success'))
                                    <div class="alert alert-success mb-4" id="success-alert">
                                        <center><span class="text-white">{{Session::get('success')}}</span></center>
                                    </div>
                                @endif -->
                            <form action="{{route('admin_calendar_update')}}" method="POST" enctype="multipart/form-data">@csrf
                                <div class="mb-4">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" required name="title">
                                </div>
                                <div class="mb-4">
                                    <label for="title">Description</label>
                                    <input type="text" class="form-control" required name="description">
                                </div>
                                <div class="my-4">
                                    <label for="textarea">Event Date</label>
                                    <input type="date" name="date" min="{{now()->toDateString('Y-m-d')}}" class="form-control" placeholder="Select date"></input>
                                </div>
                                <div class="my-4">
                                    <button class="btn btn-pill btn-outline-success" type="submit">Submit</button>
                                </div>
                            </form>
                            <!-- End of Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
