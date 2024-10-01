@extends('layouts.admin')
@section('content') 
    <div class="container">
        <h1>{{$viewData['title']}}</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['shifts'] as $shift)
                    <tr>
                        <th>{{$shift->ShiftID}}</th>
                        <th>{{$shift->Name}}</th>
                        <th>{{$shift->StartTime}}</th>
                        <th>{{$shift->EndTime}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection