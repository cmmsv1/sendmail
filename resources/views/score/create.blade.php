@extends('layouts.dashboard')
@section('content')
    <style>
        .page-title i {
            margin-right: 25px;
            font-size: 25px;
            cursor: pointer;
        }

        .toast {
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <a href="{{ route('score.index') }}"><i class="dripicons-arrow-thin-left"></i></a>
                    Thêm điểm
                    sinh viên - {{ $student->name }} {{ $student->MSV }}
                </h4>
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
                    <div class="row">
                        <div class="col-4">
                            <form method='POST' action='{{ route('score.store') }}'>
                                @csrf
                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Chọn môn học</label>
                                    <select class="form-select" name="subject" id="example-select">
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Điểm</label>
                                    <input type="number" name="score" id="simpleinput" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm điểm</button>
                            </form>
                        </div>
                        <div class="col-8">
                            <table class="table table-bordered table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Tên môn học</th>
                                        <th>Điểm</th>
                                        {{-- <th class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($scores) > 0)
                                        @foreach ($scores as $score)
                                            <tr>
                                                <td>{{ $score->subject->name }}</td>
                                                <td>{{ $score->score }}</td>
                                                {{-- <td class="table-action text-center">
                                                    <a href="javascript: void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
