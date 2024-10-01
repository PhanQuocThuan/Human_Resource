@extends('layouts.admin')
@section('content') 
    <div class="container">
        <h1>{{$viewData['title']}}</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Natiaonal ID Number</th>
                    <th>Birth Date</th>
                    <th>Hire Date</th>
                    <th>Gender</th>
                    <th>Marital Status</th>
                    <th>Job</th>
                    <th>History</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['employees'] as $employee)
                    <tr>
                        <th>{{$employee->BusinessEntityID}}</th>
                        <th>{{$employee->NationalIDNumber}}</th>
                        <th>{{$employee->BirthDate}}</th>
                        <th>{{$employee->HireDate}}</th>
                        <th>{{$employee->Gender}}</th>
                        <th>{{$employee->MaritalStatus}}</th>
                        <th>{{$employee->JobTitle}}</th>
                        <th>
                            <a href="{{ route('admin.histories.show', ['employeeId' => $employee->BusinessEntityID]) }}" class="btn btn-info">
                                Xem lịch sử
                            </a>                            
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection