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
                <h4 class="page-title"> <a href="{{ route('subject.index') }}"><i class="dripicons-arrow-thin-left"></i></a>
                    Cập nhật
                    môn học
                </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action='{{ route('subject.update', $subject->id) }}' method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="MMH" class="form-label">Mã sinh viên</label>
                            <input type="text" name="MMH" id="MMH"
                                class="form-control @error('MMH') is-invalid @enderror"
                                value="{{ old('MMH') ?? $subject->MMH }}">
                            @error('MMH')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên môn học</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name') ?? $subject->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
