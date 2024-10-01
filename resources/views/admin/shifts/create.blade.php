@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <form action="{{ route('admin.shifts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="Name" id="Name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="StartTime">Start Time</label>
                <input type="time" name="StartTime" id="StartTime" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="EndTime">End Time</label>
                <input type="time" name="EndTime" id="EndTime" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Shift</button>
            <a href="{{ route('admin.shifts.index') }}" class="btn btn-secondary">Back to shift</a>
        </form>
    </div>
@endsection
