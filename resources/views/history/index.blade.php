@extends('layouts.app')

@section('content')
<h1>{{ $viewData['title'] }}</h1>
<h2>{{ $viewData['subtitle'] }}</h2>

<table class="table">
    <thead>
        <tr>
            <th>BusinessEntityID</th>
            <th>DepartmentID</th>
            <th>ShiftID</th>
            <th>StartDate</th>
            <th>End Date</th>
            <th>ModifiedDate</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($viewData['histories'] as $history)
        <tr>
            <td>{{ $history->BusinessEntityID }}</td>
            <td>{{ $history->DepartmentID }}</td>
            <td>{{ $history->ShiftID }}</td>
            <td>{{ $history->StartDate }}</td>
            <td>{{ $history->EndDate }}</td>
            <td>{{ $history->ModifiedDate}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
