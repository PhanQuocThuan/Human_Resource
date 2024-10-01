@extends('layouts.admin')
@section('content') 
    <div class="container">
        <h1>{{$viewData['title']}}</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Group Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['departments'] as $department)
                    <tr>
                        <th>{{$department->DepartmentID}}</th>
                        <th>{{$department->Name}}</th>
                        <th>{{$department->GroupName}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection