@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
<h2>{{ $viewData['title'] }}</h2>
{{-- Tìm kiếm --}}
<form action="{{ route('admin.employees.index') }}" method="GET" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Search employees..." value="{{ request()->query('search') }}">
    <button type="submit" class="btn btn-primary mt-2">Search</button>
</form>
{{-- nút tạo --}}
<a href="{{ route('admin.employees.create') }}" class="btn btn-primary">Add Employee</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>National ID</th>
            <th>Job Title</th>
            <th>Birth Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($viewData['employees'] as $employee)
        <tr>
            <th>{{ $employee->BusinessEntityID }}
            <td>{{ $employee->NationalIDNumber }}</td>
            <td>{{ $employee->JobTitle }}</td>
            <td>{{ $employee->BirthDate }}</td>
            <td>
                {{-- xem chi tiết --}}
                <a href="{{ route('admin.employees.show', ['employee' => $employee->BusinessEntityID]) }}" class="btn btn-info">Details</a>
                {{-- nút edit --}}
                <a href="{{ route('admin.employees.edit', ['employee' => $employee->BusinessEntityID]) }}" class="btn btn-primary">Edit</a>
                {{-- nút xóa --}}
                <form action="{{ route('admin.employees.destroy', ['employee' => $employee->BusinessEntityID]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE') <!-- Xác định phương thức DELETE -->
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
