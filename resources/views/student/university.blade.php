@extends('layouts.student')

@section('page_title', 'Universities Search')

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var data = "";
        $.ajax({
            type: "POST",
            url: "{{ route('student.university.search.process') }}",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.length == 0) {
                    data += `<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                No Universities Found
                            </div>
                        </div>
                    </div>`;
                } else {
                    response.forEach(university => {
                        data += `<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">${university.name}</div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>${university.name}</b></h2>
                                        <p class="text-muted text-sm"><b>About: </b> ${university.description} </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: ${university.address}</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: ${university.phone}</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Website: ${university.website}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="/student/university/${university.id}" target="_blank" class="btn btn-sm btn-primary">University Details</a>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    });
                }
                $('#universities').html(data);
            }
        });
    });
</script>
@endsection

@section('content')
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row" id="universities">

        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
        </nav>
    </div>
    <!-- /.card-footer -->
</div>
@endsection