@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <h1>{{ $viewData['title'] }}</h1>
    <form action="{{ route('admin.departments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" name="Name" required>
        </div>
        <div class="form-group">
            <label for="GroupName">Group Name</label>
            <input type="text" class="form-control" name="GroupName" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Department</button>
    </form>
</div>
@endsection
