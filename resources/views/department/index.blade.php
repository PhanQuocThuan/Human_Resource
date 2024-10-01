@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container d-flex align-items-center justify-content-center">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Department ID</th>
                    <th>Name</th>
                    <th>Group Name</th>
                    <th>Modified Date</th>
                    <th>Show</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['departments'] as $department)
                <tr>
                    <td>{{$department ->DepartmentID}}</td>
                    <td>{{$department ->Name}}</td>
                    <td>{{$department ->GroupName}}</td>
                    <td>{{$department ->ModifiedDate}}</td>
                    <td><div class="btn text-center">
                        <a href="{{ route('department.show', ['DepartmentID' => $department['DepartmentID']]) }}"
                            class="btn bg-primary text-white">Xem</a>
                    </div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
