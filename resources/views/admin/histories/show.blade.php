@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $viewData['title'] }}</h1>
        
        <h3>Thông tin nhân viên</h3>
        <p>ID: {{ $viewData['employee']->BusinessEntityID }}</p>
        <p>National ID: {{ $viewData['employee']->NationalIDNumber }}</p>

        <h3>Lịch sử thay đổi</h3>
        @if($viewData['history']->isEmpty())
            <p>Nhân viên này chưa có lịch sử thay đổi phòng ban hoặc ca làm việc.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Phòng ban</th>
                        <th>Ca làm việc</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['history'] as $record)
                        <tr>
                            <<td>{{ $record->department ? $record->department->Name : 'Không xác định' }}</td>
                            <td>{{ $record->shift ? $record->shift->Name : 'Không xác định' }}</td>
                            <td>{{ $record->StartDate }}</td>
                            <td>{{ $record->EndDate }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Quay lại danh sách phòng ban</a>
    </div>
@endsection
