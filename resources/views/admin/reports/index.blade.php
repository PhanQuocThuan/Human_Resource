@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>{{$viewData['title']}}</h1>
        <ul>
            <li><a href="{{route('admin.reports.employees')}}">Employees Report</a></li>
            <li><a href="{{route('admin.reports.departments')}}">Departments Report</a></li>
            <li><a href="{{route('admin.reports.shifts')}}">Shifts Report</a></li>
        </ul>
    </div>
@endsection