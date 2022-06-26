@extends('layouts.dashboard')
@section('content')
    <style>
        .page-title i {
            margin-right: 25px;
            font-size: 25px;
            cursor: pointer;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <a href="{{ route('student.index') }}"><i class="dripicons-arrow-thin-left"></i></a>
                    Cập nhật
                    sinh viên
                </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action='{{ route('student.update', $student->id) }}' method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="MSV" class="form-label">Mã sinh viên</label>
                            <input type="text" name="MSV" id="MSV"
                                class="form-control @error('MSV') is-invalid @enderror"
                                value="{{ old('MSV') ?? $student->MSV }}">
                            @error('MSV')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name') ?? $student->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') ?? $student->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror "
                                value="{{ old('phone') ?? $student->phone }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
