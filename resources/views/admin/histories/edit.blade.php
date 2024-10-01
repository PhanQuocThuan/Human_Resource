@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa lịch sử</h1>

        <form action="{{ route('admin.histories.update', $history->id) }}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="StartDate">Ngày bắt đầu</label>
                <input type="date" name="StartDate" class="form-control" value="{{ $history->StartDate }}" required>
            </div>

            <div class="form-group">
                <label for="EndDate">Ngày kết thúc</label>
                <input type="date" name="EndDate" class="form-control" value="{{ $history->EndDate }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.histories.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
