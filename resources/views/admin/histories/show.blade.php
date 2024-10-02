@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $viewData['title'] }}</h1>
        
        <h3>Employee Information</h3>
        <p>ID: {{ $viewData['employee']->BusinessEntityID }}</p>
        <p>Job: {{ $viewData['employee']->JobTitle }}</p>

        <h3>History Changes</h3>
        @if($viewData['history']->isEmpty())
            <p>None History</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Shift</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['history'] as $record)
                        <tr>
                            <<td>{{ $record->department ? $record->department->Name : 'None' }}</td>
                            <td>{{ $record->shift ? $record->shift->Name : 'None' }}</td>
                            <td>{{ $record->StartDate }}</td>
                            <td>{{ $record->EndDate }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary">Back to Histories List</a>
    </div>
@endsection
