@extends('layouts.master')

@section('page_title', 'Bookings')

@section('styles')
<link rel="stylesheet" href="{{ asset('themes/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/css/responsive.bootstrap4.min.css') }}" />
@endsection

@section('scripts')
<script src="{{ asset('themes/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        gb_DataTable = $(".data-table").DataTable({
            autoWidth: false,
            order: [0, "ASC"],
            processing: true,
            serverSide: true,
            searchDelay: 2000,
            paging: true,
            ajax: "{{ route('admin.bookings') }}",
            iDisplayLength: "25",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'student.first_name',
                    name: 'student.first_name'
                },
                {
                    data: 'university.name',
                    name: 'university.name',
                },
                {
                    data: 'university_course.course.name',
                    name: 'university_course.course.name',
                },
                {
                    data: 'estimated_budget',
                    name: 'estimated_budget',
                }
            ],
            lengthMenu: [25, 50, 100]
        });
    });
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bookings List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Student Name</th>
                                <th>University Name</th>
                                <th>Course Name</th>
                                <th>Estimated Budget</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection