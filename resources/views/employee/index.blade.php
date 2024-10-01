@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="container d-flex align-items-center justify-content-center">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Business Entity ID</th>
                    <th>National ID Number</th>
                    <th>Login ID</th>
                    <th>Organization Node</th>
                    <th>Organization Level</th>
                    <th>Job Title</th>
                    <th>Birth Date</th>
                    <th>Marital Status</th>
                    <th>Gender</th>
                    <th>Hire Date</th>
                    <th>Vacation Hours</th>
                    <th>Sick Leave Hours</th>
                    <th>Modified Date</th>
                    <th>Show</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['employees'] as $employee)
                <tr>
                    <td>{{$employee ->BusinessEntityID}}</td>
                    <td>{{$employee ->NationalIDNumber}}</td>
                    <td>{{$employee ->LoginID}}</td>
                    <td>{{$employee ->OrganizationNode}}</td>
                    <td>{{$employee ->OrganizationLevel}}</td>
                    <td>{{$employee ->JobTitle}}</td>
                    <td>{{$employee ->BirthDate}}</td>
                    <td>{{$employee ->MaritalStatus}}</td>
                    <td>{{$employee ->Gender}}</td>
                    <td>{{$employee ->HireDate}}</td>
                    <td>{{$employee ->VacationHours}}</td>
                    <td>{{$employee ->SickLeaveHours}}</td>
                    <td>{{$employee ->ModifiedDate}}</td>
                    <td><div class="btn text-center">
                        <a href="{{ route('employee.show', ['BusinessEntityID' => $employee['BusinessEntityID']]) }}"
                            class="btn bg-primary text-white">Xem</a>
                    </div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
