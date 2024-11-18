@extends('layouts.student')

@section('page_title', 'Course Details')

@section('content')
<div class="container-fluid">
    @if (session()->has('message'))
    <div class="alert alert-{{session()->get('type')}}">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-globe"></i> {{ $university_course->course->name }}
                            <small class="float-right">Date: {{ $university_course->intake }}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <address>
                            Name: <strong>{{ $university_course->course->name }}</strong><br>
                            Fees: {{ $university_course->fees }}<br>
                            Duration: {{ $university_course->duration }} months<br>
                        </address>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Table row -->
                <div class="row">
                    <div class="col-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Booking Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{ route('student.university.course.booking.process') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="first-name">First Name</label>
                                        <div class="form-control" id="first-name">{{ Auth::user()->first_name }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="last-name">Last Name</label>
                                        <div class="form-control" id="last-name">{{ Auth::user()->last_name }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="form-control" id="email">{{ Auth::user()->email }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <div class="form-control" id="phone">{{ Auth::user()->phone }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="university-course">University Course</label>
                                        <div class="form-control" id="university-course">{{ $university_course->course->name }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="university-course-fees">Estimated budget</label>
                                        <div class="form-control" id="university-course-fees">{{ $university_course->fees }}</div>
                                    </div>
                                    <input type="hidden" name="university_course_id" value="{{ $university_course->id }}" />
                                    <input type="hidden" name="university_id" value="{{ $university_course->university_id }}" />
                                    <input type="hidden" name="student_id" value="{{ Auth::user()->id }}" />
                                    <div class="form-group">
                                        <label for="start-date">Start Date</label>
                                        <input type="date" name="start_date" class="form-control" id="start-date" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ \Carbon\Carbon::parse($university_course->intake)->format('Y-m-d') }}" />
                                        @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Case type</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="case_type" value="1" checked="" />
                                            <label class="form-check-label">Single</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="case_type" value="2" />
                                            <label class="form-check-label">Spouse</label>
                                        </div>
                                        @error('case_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Study mode</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mode_of_study" value="1" checked="" />
                                            <label class="form-check-label">Full-time</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="mode_of_study" />
                                            <label class="form-check-label">Part-time</label>
                                        </div>
                                        @error('mode_of_study')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Book</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div>
</div>
@endsection