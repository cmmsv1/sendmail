<table class="table table-bordered table-centered mb-0">
    <thead>
        <tr>
            <th>Tên môn học</th>
            <th>Điểm</th>
        </tr>
    </thead>
    <tbody>
        @if (count($scores) > 0)
            @foreach ($scores as $score)
                <tr>
                    <td>{{ $score->subject->name }}</td>
                    <td>{{ $score->score }}</td>

                </tr>
            @endforeach
        @endif

    </tbody>
</table>
