@extends('layouts.admin')

@section('title', 'Employee Details')

@section('content')
<div class="container mt-5">
    <h2>Employee Details</h2>

    <div class="card mb-4">
        <div class="card-header">
            Employee Information
        </div>
        <div class="card-body">
            <p><strong>Business Entity ID:</strong>{{$viewData['employee']->BusinessEntityID}}</p>
            <p><strong>National ID Number:</strong> {{ $viewData['employee']->NationalIDNumber }}</p>
            <p><strong>Login ID:</strong> {{ $viewData['employee']->LoginID }}</p>
            <p><strong>Organization Node:</strong>{{$viewData['employee']->OrganizationNode}}</p>
            <p><strong>Organization Level:</strong>{{$viewData['employee']->OrganizationLevel}}</p>
            <p><strong>Job Title:</strong> {{ $viewData['employee']->JobTitle }}</p>
            <p><strong>Birth Date:</strong> {{ $viewData['employee']->BirthDate }}</p>
            <p><strong>Marital Status:</strong> {{ $viewData['employee']->MaritalStatus == 'M' ? 'Married' : 'Single' }}</p>
            <p><strong>Gender:</strong> {{ $viewData['employee']->Gender == 'M' ? 'Male' : 'Female' }}</p>
            <p><strong>Hire Date:</strong> {{ $viewData['employee']->HireDate }}</p>
            <p><strong>Vacation Hours:</strong>{{$viewData['employee']->VacationHours}}</p>
            <p><strong>Sick Leave Hours:</strong>{{$viewData['employee']->SickLeaveHours}}</p>
            <p><strong>Modified Date:</strong>{{$viewData['employee']->ModifiedDate}}</p>
        </div>
    </div>

    <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">Back to Employee List</a>
    <a href="{{ route('admin.employees.edit', ['employee' => $viewData['employee']->BusinessEntityID]) }}" class="btn btn-warning">Edit Employee</a>
</div>
@endsection
