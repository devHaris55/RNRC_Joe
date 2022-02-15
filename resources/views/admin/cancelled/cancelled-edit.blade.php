@extends('admin.layouts.main')
@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_assigned')}}">Appointment-List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Appointment-Edit</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Appointment Edit</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-5 mb-4 ml-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <div class="row mb-4">

                        <div class="col-lg-12 col-sm-12">
                            <!-- Form -->
                            @if(Session::has('update'))
                                <div class="alert alert-warning mb-4" id="success-alert">
                                    <center><span class="text-white">{{Session::get('update')}}</span></center>
                                </div>
                            @endif
                            <!-- <form action="{{route('admin_banners_add_edit').'/'.$appointment->id}}" method="POST" enctype="multipart/form-data">@csrf -->
                            <form action="{{route('admin_assigned_add_edit', [ 'id' => $appointment->id ])}}" method="POST" enctype="multipart/form-data">@csrf
                                <div class="mb-4">
                                    <label for="title">First Name</label>
                                    <input type="text" name="first_name" class="form-control" value="{{ $appointment->first_name }}" required readonly id="exampleInputPassword1">
                                </div>
                                <div class="mb-4">
                                    <label for="title">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ $appointment->last_name }}" required readonly id="exampleInputPassword1">
                                </div>
                                <div class="mb-4">
                                    <label for="title">Email address</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ $appointment->last_name }}" required readonly id="exampleInputPassword1">
                                </div>
                                <div class="mb-4">
                                    <label for="title">Select date</label>
                                    <input type="date" name="date" min="{{ Carbon\Carbon::now() }}" value="{{ $appointment->date }}" class="form-control" required id="exampleInputEmail1" >
                                </div>
                                <div class="mb-4">
                                <label for="disabledSelect" required class="form-label">Select start time</label>
                                    <select name="start_time" class="form-select">
                                        <option {{ $start_time[1] == "09:00:00" ? 'selected' : '' }} value="09:00">09:00</option>
                                        <option {{ $start_time[1] == "10:00:00" ? 'selected' : '' }} value="10:00">10:00</option>
                                        <option {{ $start_time[1] == "11:00:00" ? 'selected' : '' }} value="11:00">11:00</option>
                                        <option {{ $start_time[1] == "12:00:00" ? 'selected' : '' }} value="12:00">12:00</option>
                                        <option {{ $start_time[1] == "13:00:00" ? 'selected' : '' }} value="13:00">13:00</option>
                                        <option {{ $start_time[1] == "14:00:00" ? 'selected' : '' }} value="14:00">14:00</option>
                                        <option {{ $start_time[1] == "15:00:00" ? 'selected' : '' }} value="15:00">15:00</option>
                                        <option {{ $start_time[1] == "16:00:00" ? 'selected' : '' }} value="16:00">16:00</option>
                                        <option {{ $start_time[1] == "17:00:00" ? 'selected' : '' }} value="17:00">17:00</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                <label for="disabledSelect" required class="form-label">Select end time</label>
                                    <select name="end_time" class="form-select">
                                        <option {{ $end_time[1] == "10:00:00" ? 'selected' : '' }} value="10:00">10:00</option>
                                        <option {{ $end_time[1] == "11:00:00" ? 'selected' : '' }} value="11:00">11:00</option>
                                        <option {{ $end_time[1] == "12:00:00" ? 'selected' : '' }} value="12:00">12:00</option>
                                        <option {{ $end_time[1] == "13:00:00" ? 'selected' : '' }} value="13:00">13:00</option>
                                        <option {{ $end_time[1] == "14:00:00" ? 'selected' : '' }} value="14:00">14:00</option>
                                        <option {{ $end_time[1] == "15:00:00" ? 'selected' : '' }} value="15:00">15:00</option>
                                        <option {{ $end_time[1] == "16:00:00" ? 'selected' : '' }} value="16:00">16:00</option>
                                        <option {{ $end_time[1] == "17:00:00" ? 'selected' : '' }} value="17:00">17:00</option>
                                        <option {{ $end_time[1] == "18:00:00" ? 'selected' : '' }} value="18:00">18:00</option>
                                    </select>
                                </div>
                                <div class="my-4">
                                    <label for="textarea">Reason</label>
                                    <textarea class="form-control" placeholder="Enter your message..." id="textarea" rows="4" required readonly name="reason">{{ $appointment->reason }}</textarea>
                                </div>
                                <div class="my-4">
                                    <label for="textarea">Select Appearance</label>
                                    <select name="appearance_status" class="form-select">
                                        <option {{ $appointment->appearance_status == 0 ? 'selected' : '' }} value="0">Assigned</option>
                                        <option {{ $appointment->appearance_status == 1 ? 'selected' : '' }} value="1">Un-assigned</option>
                                    </select>
                                </div>
                                <div class="my-4">
                                    <button class="btn btn-pill btn-outline-success" type="submit">Update</button>
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
