<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <style>
    section.mein_order {
        padding: 5% 0;
    }

    .mein_order .btn.btn_red {
        font-size: 18px;
        line-height: 20px;
        font-weight: 600;
        padding: 0 0px;
        color: #fff;
        margin: 0;
        border-radius: 6px;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        text-transform: capitalize;
        border: 2px solid #ef0202;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 48px;
        width: 145px;
        background: #ef0202;

    }
</style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <!-- <body>
    <div id="example_wrapper" class="dataTables_wrapper no-footer">
                    <div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label></div>
                    <div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example"></label></div>
                    <table id="example" class="display dataTable no-footer" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending" style="width: 69.4844px;">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 146.828px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Invoice No: activate to sort column ascending" style="width: 230.094px;">Invoice No</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="State: activate to sort column ascending" style="width: 136.906px;">State</th>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column descending" aria-sort="ascending" style="width: 160.688px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd">
                                <td valign="top" colspan="5" class="dataTables_empty">No data available in table</td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                    <div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="0" tabindex="-1" id="example_previous">Previous</a><span></span><a class="paginate_button next disabled" aria-controls="example" data-dt-idx="1" tabindex="-1" id="example_next">Next</a></div>
                </div>
                <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script>
            $(document).ready( function () {
                $('#assigned').DataTable();
            } );
            $(document).ready( function () {
                $('#un-assigned').DataTable();
            } );
            $(document).ready( function () {
                $('#cancel').DataTable();
            } );
        </script>
    </body> -->
    <body>
    @include('flash-message')
        <div class="container ">
        <a style="float:right;border:1px; background-color:yellow;padding:5px 2px 5px 2px;margin-top:10px;" href="{{ route('U_index') }}">User Panel</a>

            <div>
                <table id="assigned" class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Progress Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assigned as $assign)
                        <tr>
                            <td>{{ $assign->first_name.' '.$assign->last_name }}</td>
                            <td>{{ $assign->email }}</td>
                            <td>{{ $assign->start_time }}</td>
                            <td>{{ $assign->end_time }}</td>
                            <td>{{ $assign->progress_status }}</td>
                            <td>
                                <div>
                                    <a style="float:left;border:1px; background-color:yellow;padding:5px 2px 5px 2px;margin-top:10px;margin-right:10px;" href="{{ route('A_edit_appointment', ['id' => $assign->id ]) }}">Edit</a>
                                    <a style="float:right;border:1px; background-color:yellow;padding:5px 2px 5px 2px;margin-top:10px;margin-left:10px;" href="{{ route('A_cancel_appointment', ['id' => $assign->id] ) }}">Cancel</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <table id="un-assigned" class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Progress Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($un_assigned as $un_assign)
                        <tr>
                            <td>{{ $un_assign->first_name.' '.$un_assign->last_name}}</td>
                            <td>{{ $un_assign->email }}</td>
                            <td>{{ $un_assign->start_time }}</td>
                            <td>{{ $un_assign->end_time }}</td>
                            <td>{{ $un_assign->progress_status }}</td>
                            <td>
                                <div>
                                    <a style="float:left;border:1px; background-color:yellow;padding:5px 2px 5px 2px;margin-top:10px;margin-right:10px;" href="{{ route('A_edit_appointment', ['id' => $un_assign->id ]) }}">Edit</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <table id="canceled" class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Progress Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($canceled as $cancel)
                        <tr>
                            <td>{{ $cancel->first_name.' '.$cancel->last_name }}</td>
                            <td>{{ $cancel->email }}</td>
                            <td>{{ $cancel->start_time }}</td>
                            <td>{{ $cancel->end_time }}</td>
                            <td>{{ $cancel->progress_status }}</td>
                            <td>
                                <div>
                                    <a style="float:left;border:1px; background-color:yellow;padding:5px 2px 5px 2px;margin-top:10px;margin-right:10px;" href="{{ route('A_edit_appointment', ['id' => $cancel->id ]) }}">Schedule Appointment</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script>
            $(document).ready( function () {
                $('#assigned').DataTable();
            } );
            $(document).ready( function () {
                $('#un-assigned').DataTable();
            } );
            $(document).ready( function () {
                $('#cancel').DataTable();
            } );
        </script>
    </body>
</html>
