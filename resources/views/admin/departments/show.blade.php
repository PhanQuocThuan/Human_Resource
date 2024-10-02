@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
<h1>{{ $viewData['title'] }}</h1>

<h2>Employees:</h2>
<ul>
    @foreach ($viewData['department']->employees as $employee)
        <li>ID:{{ $employee->BusinessEntityID }}, Job: {{ $employee->JobTitle}}</li>
    @endforeach
</ul>

<a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Back to Department List</a>

@endsection
