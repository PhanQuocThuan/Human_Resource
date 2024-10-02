@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $viewData['title'] }}</h1>
        <a href="{{ route('admin.shifts.create') }}" class="btn btn-primary">Add Shift</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Actions</th>
                </tr>
            </thead>    
            <tbody>
                @foreach ($viewData['shifts'] as $shift) <!-- Sử dụng $viewData['shifts'] -->
                    <tr>
                        <td>{{ $shift->Name }}</td>
                        <td>{{ $shift->StartTime }}</td>
                        <td>{{ $shift->EndTime }}</td>
                        <td>
                            <a href="{{ route('admin.shifts.edit', $shift->ShiftID) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.shifts.destroy', $shift->ShiftID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Delete</button>
                            </form>
                            <a href="{{ route('admin.shifts.show', $shift->ShiftID) }}" class="btn btn-secondary">Assignment</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
