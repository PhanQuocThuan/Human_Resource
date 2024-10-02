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
            $viewData["employees"] = Employee::where('NationalIDNumber', 'like', '%' . $search . '%')//tìm theo nationalID
                ->orWhere('LoginID', 'like', '%' . $search . '%')
                ->orWhere('JobTitle', 'like', '%' . $search . '%')
                ->orWhere('BirthDate', 'like', '%' . $search . '%')
                ->orWhere('BusinessEntityID', 'like', '%' . $search . '%')
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

    public function store(Request $request, $id)
    {
        // thông tin nhập vào form
        $request->validate([
            "NationalIDNumber" => "required|max:100",
            "LoginID" => "required|max:255",
            "JobTitle" => "required|max:50",
            "BirthDate" => "required|date",
            "MaritalStatus" => "required|in:M,S",
            "Gender" => "required|in:M,F",
            "HireDate" => "required|date",
        ]);
        // tạo nhân viên với dữ liệu từ form
        Employee::create($request->only([
            "NationalIDNumber", 
            "LoginID", 
            "JobTitle", 
            "BirthDate", 
            "MaritalStatus", 
            "Gender", 
            "HireDate",
            'created_at' => now(), 
        ]));

        return redirect()->route('admin.employees.index')->with('success', 'Employee added successfully!');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);//tìm id của nhân viên
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
        //thông tin nhập vào để sửa
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
    
        $employee = Employee::findOrFail($id);//tìm nhân viên 
        $employee->ModifiedDate = now();//ngày chỉnh sửa là hiện tại khi click vào
        $employee->update($request->only([//update thông tin nhân viên
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
            'updated_at' => now(),
            
        ]));
    
        return redirect()->route('admin.employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id); // tìm nhân viên
        $employee->delete(); // thực hiện xóa nhân viên

        return redirect()->route('admin.employees.index')->with('success', 'Employee deleted successfully!');
    }
}
