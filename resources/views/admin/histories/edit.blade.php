<form action="{{ route('admin.reports.filter') }}" method="GET">
    @csrf
    <!-- Filter by Department -->
    <label for="department">Department:</label>
    <select name="department_id" id="department">
        <option value="">All Departments</option>
        @foreach ($departments as $department)
            <option value="{{ $department->DepartmentID }}">{{ $department->Name }}</option>
        @endforeach
    </select>

    <!-- Filter by Shift -->
    <label for="shift">Shift:</label>
    <select name="shift_id" id="shift">
        <option value="">All Shifts</option>
        @foreach ($shifts as $shift)
            <option value="{{ $shift->ShiftID }}">{{ $shift->Name }}</option>
        @endforeach
    </select>

    <!-- Filter by Date Range -->
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date">
    
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date">
    
    <button type="submit" class="btn btn-primary">Filter</button>
</form>
