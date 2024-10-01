@extends('layouts.app')
@section('content')
<h2>THÔNG TIN NHÂN VIÊN</h2>
<p class="text-warning">Business Entity ID: {{$viewData['employee']->BusinessEntityID}}</p>
<p class="text-warning">National ID Number: {{$viewData['employee']->NationalIDNumber}}</p>
<p class="text-warning">Login ID: {{$viewData['employee']->LoginID}}</p>
<p class="text-warning">Organization Node: {{$viewData['employee']->OrganizationNode}}</p>
<p class="text-warning">Organization Level: {{$viewData['employee']->OrganizationLevel}}</p>
<p class="text-warning">Job Title: {{$viewData['employee']->JobTitle}}</p>
<p class="text-warning">Birth Date: {{$viewData['employee']->BirthDate}}</p>
<p class="text-warning">Marital Status: {{$viewData['employee']->MaritalStatus}}</p>
<p class="text-warning">Gender: {{$viewData['employee']->Gender}}</p>
<p class="text-warning">Hire Date: {{$viewData['employee']->HireDate}}</p>
<p class="text-warning">Vacation Hours: {{$viewData['employee']->VacationHours}}</p>
<p class="text-warning">Sick Leave Hours: {{$viewData['employee']->SickLeaveHours}}</p>
<p class="text-warning">Modified Date: {{$viewData['employee']->ModifiedDate}}</p>
@endsection
