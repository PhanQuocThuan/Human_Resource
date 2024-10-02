@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>History Change</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Department</th>
                    <th>Shift</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        {{-- <td>{{ $history->id }}</td> --}}
                        <td>{{ $history->department ? $history->department->Name : 'None' }}</td>
                        <td>{{ $history->shift ? $history->shift->Name : 'None' }}</td>
                        <td>{{ $history->StartDate }}</td>
                        <td>{{ $history->EndDate }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
