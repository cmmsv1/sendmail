@extends('layouts.dashboard')
@section('content')
    <style>
        .toast {
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Score</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('message'))
                        <div class="toast d-flex align-items-center text-white bg-primary border-0" role="alert">
                            <div class="toast-body">
                                {{ session('message') }}
                            </div>
                            <button type="button" class="btn-close btn-close-white ms-auto me-2"></button>
                        </div>
                    @endif

                    <div class="row mb-2">
                        <div class="col-xl-12">
                            <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                <div class="col-auto">
                                    <label for="inputPassword2" class="visually-hidden">Search</label>
                                    <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                </div>
                                <div class="col-auto">
                                    <div class="d-flex align-items-center">
                                        <label for="status-select" class="me-2">Status</label>
                                        <select class="form-select" id="status-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Paid</option>
                                            <option value="2">Awaiting Authorization</option>
                                            <option value="3">Payment failed</option>
                                            <option value="4">Cash On Delivery</option>
                                            <option value="5">Fulfilled</option>
                                            <option value="6">Unfulfilled</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="col-xl-4">
                            <div class="text-xl-end mt-xl-0 mt-2">
                                <a href="{{ route('add-student.create') }}" class="btn btn-danger mb-2 me-2"><i
                                        class="mdi mdi-basket me-1"></i>
                                    Thêm sinh viên</a>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col--> --}}
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Mã sinh viên</th>
                                    <th>Họ và tên</th>
                                    <th style="width: 125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td class="MSV">
                                            {{ $student->MSV }}</a>
                                        </td>
                                        <td>
                                            {{ $student->name }}
                                        </td>
                                        <td>

                                            <a href="{{ route('score.addScore', $student->id) }}" class="action-icon">
                                                <i class="uil uil-focus-add"></i></a>
                                            <a href="javascript:void(0)" data-href='{{ $student->id }}'
                                                class="view action-icon" data-bs-toggle="modal"
                                                data-bs-target="#scrollable-modal"><i class="mdi mdi-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog"
                            aria-labelledby="scrollableModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->

                        </div><!-- /.modal -->
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

    <script>
        $(document).ready(function() {
            $('.view').click(function(e) {
                e.preventDefault();
                const student_id = $(this).data('href')
                const student_MSV = $(this).parent().parent().find('.MSV').text()
                $.ajax({
                    type: "GET",
                    url: "/score/" + student_id,
                    success: function(response) {
                        $('.modal-body').html(response)
                        $('.modal-title').text('Điểm sinh viên: ' + student_MSV)
                    }
                });
            });
        });
    </script>
@endsection
