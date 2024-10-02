@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>{{$title}}</h1>
        <ul>
            <li><a href="{{route('admin.reports.employees')}}">Employees Report</a></li>
            <li><a href="{{route('admin.reports.departments')}}">Departments Report</a></li>
            <li><a href="{{route('admin.reports.shifts')}}">Shifts Report</a></li>
        </ul>
    </div>
    <form action="{{ route('admin.reports.filter') }}" method="GET">
        @csrf
        <label for="department">Department:</label>
        <select name="department_id" id="department">
            <option value="">All Departments</option>
            @foreach ($departments as $department)
                <option value="{{ $department->DepartmentID }}">{{ $department->Name }}</option>
            @endforeach
        </select>

        <label for="shift">Shift:</label>
        <select name="shift_id" id="shi ft">
            <option value="">All Shifts</option>
            @foreach ($shifts as $shift)
                <option value="{{ $shift->ShiftID }}">{{ $shift->Name }}</option>
            @endforeach
        </select>

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date">
        
        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date">
        
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Department</th>
                <th>Shift</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ optional($result->department)->Name }}</td>
                    <td>{{ optional($result->shift)->Name }}</td>
                    <td>{{ $result->StartDate }}</td>
                    <td>{{ $result->EndDate }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    
    
@endsection