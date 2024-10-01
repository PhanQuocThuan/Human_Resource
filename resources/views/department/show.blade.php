@extends('layouts.app')

@section('content')
<h2>Thông Tin Phòng Ban: {{ $department->Name }}</h2>
<p>Group: {{ $department->GroupName }}</p>

<h3>Danh Sách Nhân Viên</h3>
<ul>
    @foreach ($employees as $employee)
        @if ($employee) <!-- Kiểm tra xem employee có null không -->
            <li>Business Entity ID: <strong>{{ $employee->BusinessEntityID }}</strong> National ID Number: <strong>{{ $employee->NationalIDNumber }}</strong></li>
        @else
            <li>Không có dữ liệu nhân viên</li>
        @endif
    @endforeach
</ul>
@endsection