@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
<h1>{{ $viewData['title'] }}</h1>

<h2>Employees:</h2>
<ul>
    @foreach ($viewData['department']->employees as $employee)
        <li>{{ $employee->NationalIDNumber }}</li>
    @endforeach
</ul>

<h2>Shifts:</h2>
<ul>
    @if (isset($viewData['shifts']) && !empty($viewData['shifts']))
        @foreach ($viewData['shifts'] as $shift)
            <li>{{ $shift->Name }} (From: {{ $shift->StartTime }} To: {{ $shift->EndTime }})</li>
        @endforeach
    @else
        <li>No shifts assigned.</li>
    @endif
</ul>

<a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Back to Department List</a>

@endsection
