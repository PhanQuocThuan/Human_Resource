@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
<div class="container">
    <h1>{{ $viewData['title'] }}</h1>
    <form action="{{ route('admin.departments.update', ['department' => $viewData['department']->DepartmentID]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" name="Name" value="{{ $viewData['department']->Name }}" required>
        </div>
        <div class="form-group">
            <label for="GroupName">Group Name</label>
            <input type="text" class="form-control" name="GroupName" value="{{ $viewData['department']->GroupName }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Department</button>
    </form>
</div>
@endsection
