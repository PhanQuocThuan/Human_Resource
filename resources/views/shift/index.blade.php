@extends('layouts.app')

@section('content')
<h2>Danh sách các ca làm</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Shift ID</th>
            <th>Name</th>
            <th>StartTime</th>
            <th>EndTime</th>
            <th>Show</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($viewData['shifts'] as $shift)
        <tr>
            <td>{{ $shift->ShiftID }}</td>
            <td>{{ $shift->Name }}</td>
            <td>{{ $shift->StartTime }}</td>
            <td>{{ $shift->EndTime }}</td>
            <td>
                <div class="btn text-center">
                    <a href="{{ route('shift.show', ['ShiftID' => $shift->ShiftID]) }}" class="btn bg-primary text-white">Xem</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
