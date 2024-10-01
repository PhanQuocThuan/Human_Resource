@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
<h2>{{ $viewData['title'] }}</h2>
<form action="{{ route('admin.employees.update', ['employee' => $viewData['employee']->BusinessEntityID]) }}" method="POST">
    @csrf
    @method('PUT')
    <label>National ID Number:</label>
    <input type="text" name="NationalIDNumber" class="form-control" value="{{ $viewData['employee']->NationalIDNumber }}" required>
    <label>Login ID:</label>
    <input type="text" name="LoginID" class="form-control" value="{{ $viewData['employee']->LoginID }}" required>
    <label>Organization Node:</label>
    <input type="text" name="OrganizationNode" class="form-control" value="{{ $viewData['employee']->OrganizationNode }}">
    <label>Organization Level:</label>
    <input type="text" name="OrganizationLevel" class="form-control" value="{{ $viewData['employee']->OrganizationLevel }}">
    <label>Job Title:</label>
    <input type="text" name="JobTitle" class="form-control" value="{{ $viewData['employee']->JobTitle }}" required>
    <label>Birth Date:</label>
    <input type="date" name="BirthDate" class="form-control" value="{{ $viewData['employee']->BirthDate }}" required>
    <label>Marital Status:</label>
    <select name="MaritalStatus" class="form-control">
        <option value="M" @if($viewData['employee']->MaritalStatus == 'M') selected @endif>Married</option>
        <option value="S" @if($viewData['employee']->MaritalStatus == 'S') selected @endif>Single</option>
    </select>
    <label>Gender:</label>
    <select name="Gender" class="form-control">
        <option value="M" @if($viewData['employee']->Gender == 'M') selected @endif>Male</option>
        <option value="F" @if($viewData['employee']->Gender == 'F') selected @endif>Female</option>
    </select>
    <label>Hire Date:</label>
    <input type="date" name="HireDate" class="form-control" value="{{ $viewData['employee']->HireDate }}" required>
    <label>Vacation Hours:</label>
    <input type="number" name="VacationHours" class="form-control" value="{{ $viewData['employee']->VacationHours }}" min="0">
    <label>Sick Leave Hours:</label>
    <input type="number" name="SickLeaveHours" class="form-control" value="{{ $viewData['employee']->SickLeaveHours }}" min="0">
    <button type="submit" class="btn btn-primary mt-3">Update Employee</button>
</form>
@endsection
