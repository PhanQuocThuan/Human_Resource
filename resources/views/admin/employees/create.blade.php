@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <h1>{{ $viewData['title'] }}</h1>
    <form action="{{ route('admin.employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="NationalIDNumber">National ID Number</label>
            <input type="text" class="form-control" name="NationalIDNumber" required>
        </div>
        <div class="form-group">
            <label for="LoginID">Login ID</label>
            <input type="text" class="form-control" name="LoginID" required>
        </div>
        <div class="form-group">
            <label for="JobTitle">Job Title</label>
            <input type="text" class="form-control" name="JobTitle" required>
        </div>
        <div class="form-group">
            <label for="BirthDate">Birth Date</label>
            <input type="date" class="form-control" name="BirthDate" required>
        </div>
        <div class="form-group">
            <label for="MaritalStatus">Marital Status</label>
            <select name="MaritalStatus" class="form-control" required>
                <option value="M">Married</option>
                <option value="S">Single</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Gender">Gender</label>
            <select name="Gender" class="form-control" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="HireDate">Hire Date</label>
            <input type="date" class="form-control" name="HireDate" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Employee</button>
    </form>
</div>
@endsection
