@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit shift: {{ $shift->Name }}</h1>
        <form action="{{ route('admin.shifts.update', $shift->ShiftID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="Name" id="Name" class="form-control" value="{{ $shift->Name }}" required>
            </div>
            <div class="form-group">
                <label for="StartTime">Start Time</label>
                <input type="time" name="StartTime" id="StartTime" class="form-control" value="{{ $shift->StartTime }}" required>
            </div>
            <div class="form-group">
                <label for="EndTime">End Time</label>
                <input type="time" name="EndTime" id="EndTime" class="form-control" value="{{ $shift->EndTime }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.shifts.index') }}" class="btn btn-secondary">Back to shift</a>
        </form>
    </div>
@endsection
