@extends('layouts.app')

@section('content')
<h2>Ca làm việc: {{ $shift->Name }}</h2>
<p>Bắt đầu: {{ $shift->StartTime }}</p>
<p>Kết thúc: {{ $shift->EndTime }}</p>

<h3>Danh sách nhân viên trong ca</h3>
<ul>
    @foreach ($employees as $employee)
        <li>ID: {{ $employee->BusinessEntityID }} - Job: {{ $employee->JobTitle }}</li>
    @endforeach
</ul>
@endsection
