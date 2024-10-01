@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Lịch sử thay đổi</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Phòng ban</th>
                    <th>Ca làm việc</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td>{{ $history->id }}</td>
                        <td>{{ $history->department ? $history->department->Name : 'Không xác định' }}</td>
                        <td>{{ $history->shift ? $history->shift->Name : 'Không xác định' }}</td>
                        <td>{{ $history->StartDate }}</td>
                        <td>{{ $history->EndDate }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
