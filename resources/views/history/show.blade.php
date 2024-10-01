@extends('layouts.app')

@section('content')
<h1>Lịch sử của nhân viên</h1>

<p>ID: {{ $history->id }}</p>
<p>Employee ID: {{ $history->employee_id }}</p>
<p>Department ID: {{ $history->department_id }}</p>
<p>Start Date: {{ $history->start_date }}</p>
<p>End Date: {{ $history->end_date }}</p>

<!-- Hiển thị thông tin nhân viên hoặc phòng ban liên quan nếu cần -->
@endsection
