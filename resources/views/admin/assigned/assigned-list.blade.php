@extends('admin.layouts.main')
@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}"><span class="fas fa-home"></span></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Assigned-Conflict Request</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Assigned-Conflict Request-List</h1>
            </div>
            <!-- <div>
                <a href="{{ route('admin_banners_add') }}" class="btn btn-outline-gray"><i class="far fa-plus-square mr-1"></i> Add New Banner</a>
            </div> -->
        </div>
    </div>

    <div class="card border-light shadow-sm mb-4">
        <div class="card-body">
            @if (Session::has('delete'))
                <div class="alert alert-danger mb-4" id="success-alert">
                    <center><span class="text-white">{{ Session::get('delete') }}</span></center>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded" id="table_id">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0">#</th>
                            <th class="border-0">Name</th>
                            <!-- <th class="border-0">Image</th> -->
                            <th class="border-0">Email</th>
                            <th class="border-0">Form Type</th>
                            <th class="border-0">Event</th>
                            <th class="border-0">Date</th>
                            <!-- <th class="border-0">Progress Status</th> -->
                            <th class="border-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <!-- Start of Item -->

                        @foreach ($assigned as $key => $assign)
                            <tr>
                                <td class="border-0"><a href="#"
                                        class="text-primary font-weight-bold">{{ $key + 1 }}</a> </td>
                                <td class="border-0 font-weight-bold">{{ $assign->first_name . ' ' . $assign->last_name }}
                                </td>

                                <td class="border-0 font-weight-bold">{{ $assign->email }}</td>
                                <td class="border-0 font-weight-bold">
                                    @if ($assign->form_type == 1)
                                        Partial Day
                                    @elseif($assign->form_type == 2)
                                        Full Day
                                    @else
                                        Reccuring Day
                                    @endif
                                </td>
                                <td class="border-0 font-weight-bold">
                                    {{ $assign->getevent == '' ? 'Not Assigned' : $assign->getevent->title }}</td>
                                <td class="border-0 font-weight-bold">{{ $assign->date }}</td>
                                <!-- <td class="border-0 font-weight-bold">{{ $assign->progress_status }}</td> -->

                                <td class="border-0">
                                    <a href="{{ route('admin_assigned_edit') . '/' . $assign->id }}"
                                        class="text-secondary mr-3"><i class="fas fa-edit"></i>Edit</a>
                                    <!--<span class="text-primary"> |  </span>-->
                                    <!--<a href="{{ route('admin_assigned_delete') . '/' . $assign->id }}" class="text-danger ml-3"><i class="far fa-trash-alt"></i>Cancel</a>-->
                                </td>
                            </tr>
                        @endforeach
                        <!-- End of Item -->
                        <!-- Item -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
@endpush
