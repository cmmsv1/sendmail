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
                <h4 class="page-title">Subject</h4>
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
                        <div class="col-xl-8">
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
                        <div class="col-xl-4">
                            <div class="text-xl-end mt-xl-0 mt-2">
                                <a href="{{ route('subject.create') }}" class="btn btn-danger mb-2 me-2"><i
                                        class="mdi mdi-basket me-1"></i>
                                    Thêm môn học</a>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Mã môn học</th>
                                    <th>Tên môn học</th>
                                    <th style="width: 125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td>
                                            {{ $subject->MMH }}
                                        </td>
                                        <td>
                                            {{ $subject->name }}
                                        </td>
                                        <td>

                                            <a href="{{ route('subject.edit', $subject->id) }}" class="action-icon">
                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i
                                                    class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{-- <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="products-datatable_info" role="status"
                                    aria-live="polite">Showing products 1 to 5 of 12</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="products-datatable_paginate">
                                    <ul class="pagination pagination-rounded">
                                        <li class="paginate_button page-item previous disabled"
                                            id="products-datatable_previous"><a href="#"
                                                aria-controls="products-datatable" data-dt-idx="0" tabindex="0"
                                                class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="products-datatable" data-dt-idx="1" tabindex="0"
                                                class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="products-datatable" data-dt-idx="2" tabindex="0"
                                                class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="products-datatable" data-dt-idx="3" tabindex="0"
                                                class="page-link">3</a></li>
                                        <li class="paginate_button page-item next" id="products-datatable_next"><a
                                                href="#" aria-controls="products-datatable" data-dt-idx="4"
                                                tabindex="0" class="page-link"><i
                                                    class="mdi mdi-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
