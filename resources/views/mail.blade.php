<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
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
                        <td class="table-action text-center">
                            <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
</body>

</html>
