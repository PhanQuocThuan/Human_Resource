<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
    $viewData = [];
    $viewData["title"] = "Employees";
    $viewData["subtitle"] = "List of Employees";
    $viewData["employees"] = Employee::all();
    return view('employee.index')->with("viewData", $viewData);
    }
    public function show($BusinessEntityID)
    {
    $viewData = [];
    $employee = Employee::where('BusinessEntityID', $BusinessEntityID)->firstOrFail();
    $viewData["employee"] = $employee;
    return view('employee.show')->with("viewData", $viewData);
    }
    
}
