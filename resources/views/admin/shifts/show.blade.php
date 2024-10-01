@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
<h2>{{ $viewData['title'] }}</h2>

{{-- Thông báo thành công --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Form phân công ca --}}
<form action="{{ route('admin.shifts.assign', $viewData['shift']->ShiftID) }}" method="POST">
    @csrf
    <label for="employee_ids">Select Employees:</label>
    <select name="employee_ids[]" multiple>
        @foreach ($viewData['employees'] as $employee)
            <option value="{{ $employee->BusinessEntityID }}">{{ $employee->NationalIDNumber }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Assign Shift</button>
</form>

<a href="{{ route('admin.shifts.index') }}" class="btn btn-secondary">Back to Shifts List</a>

@endsection
