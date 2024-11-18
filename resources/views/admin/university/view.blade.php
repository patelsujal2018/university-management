@extends('layouts.master')

@section('page_title', 'University Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-globe"></i> {{ $university->name }}
                            <small class="float-right">Date: {{ $university->established_date }}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <address>
                            Name: <strong>{{ $university->name }}</strong><br>
                            Address: {{ $university->address }}<br>
                            Phone: {{ $university->phone }}<br>
                            Website: {{ $university->website }}<br />
                            Description: {{ $university->description }}<br />
                            Rank: {{ $university->ranking }}<br />
                            Country: {{ $university->country->name }}<br />
                            Accreditation: {{ $university->accreditation->name }}<br />
                        </address>
                    </div>
                </div>
                <!-- /.row -->

                <h4>University Courses</h4>
                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Course Name</th>
                                    <th>Fees</th>
                                    <th>Duration</th>
                                    <th>Mode of Study</th>
                                    <th>Campus Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($university->university_courses as $key => $c)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $c->course->name }}</td>
                                    <td>{{ $c->fees }}</td>
                                    <td>{{ $c->duration }} Months</td>
                                    <td>@if($c->mode_of_study == 1) Full Time @else Part Time @endif</td>
                                    <td>{{ $c->campus_location->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <h4>University Facilities</h4>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Facility Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($university->facilities as $key => $f)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $f->title }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row no-print">
                    <div class="col-12">
                        <a href="{{ route('university.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div>
</div>
@endsection