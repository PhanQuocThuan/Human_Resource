<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class AdminEmployeeController extends Controller
{
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Employees Management";
        if ($request->has('search')) {
            $search = $request->query('search');
            $viewData["employees"] = Employee::where('NationalIDNumber', 'like', '%' . $search . '%')
                ->orWhere('LoginID', 'like', '%' . $search . '%')
                ->orWhere('JobTitle', 'like', '%' . $search . '%')
                ->orWhere('BirthDate', 'like', '%' . $search . '%')
                ->get();
        } else {
            // Nếu không có tìm kiếm, lấy tất cả nhân viên
            $viewData["employees"] = Employee::all();
        }
        
        return view('admin.employees.index')->with("viewData", $viewData);
    }

    public function create()
    {
        $viewData = [
            "title" => "Add New Employee"
        ];
        return view('admin.employees.create')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        // Validate form inputs
        $request->validate([
            "NationalIDNumber" => "required|max:100",
            "LoginID" => "required|max:255",
            "JobTitle" => "required|max:50",
            "BirthDate" => "required|date",
            "MaritalStatus" => "required|in:M,S",
            "Gender" => "required|in:M,F",
            "HireDate" => "required|date",
        ]);

        // Tạo nhân viên với dữ liệu từ form
        Employee::create($request->only([
            "NationalIDNumber", 
            "LoginID", 
            "JobTitle", 
            "BirthDate", 
            "MaritalStatus", 
            "Gender", 
            "HireDate",
        ]));

        return redirect()->route('admin.employees.index')->with('success', 'Employee added successfully!');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        $viewData = [
            "title" => "Employee Details",
            "employee" => $employee
        ];
        return view('admin.employees.show')->with("viewData", $viewData);
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $viewData = [
            "title" => "Edit Employee",
            "employee" => $employee
        ];
        return view('admin.employees.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "NationalIDNumber" => "required|max:100",
            "LoginID" => "required|max:255",
            "JobTitle" => "required|max:50",
            "BirthDate" => "required|date",
            "MaritalStatus" => "required|in:M,S",
            "Gender" => "required|in:M,F",
            "HireDate" => "required|date",
            "OrganizationNode" => "nullable|string|max:255",
            "OrganizationLevel" => "nullable|string|max:255",
            "VacationHours" => "nullable|integer|min:0",
            "SickLeaveHours" => "nullable|integer|min:0",
        ]);
    
        $employee = Employee::findOrFail($id);
        $employee->ModifiedDate = now();
        $employee->update($request->only([
            "NationalIDNumber", 
            "LoginID", 
            "JobTitle", 
            "BirthDate", 
            "MaritalStatus", 
            "Gender", 
            "HireDate",
            "OrganizationNode",
            "OrganizationLevel",
            "VacationHours",
            "SickLeaveHours",
        ]));
    
        return redirect()->route('admin.employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id); // Tìm nhân viên cần xóa
        $employee->delete(); // Thực hiện xóa nhân viên

        return redirect()->route('admin.employees.index')->with('success', 'Employee deleted successfully!');
    }
}
