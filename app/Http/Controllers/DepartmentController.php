<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\History;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Departments";
        $viewData["departments"] = Department::all(); // Lấy tất cả phòng ban
        return view('department.index')->with("viewData", $viewData);
    }

    public function show($DepartmentID)
    {
        // Lấy thông tin phòng ban
        $department = Department::findOrFail($DepartmentID);
        
        // Lấy danh sách nhân viên trong phòng ban này thông qua History
        $employees = History::where('DepartmentID', $DepartmentID)
            ->with('employee') // Nếu bạn đã định nghĩa quan hệ trong Model
            ->get()
            ->pluck('employee'); // Lấy danh sách nhân viên

        // Truyền dữ liệu vào view
        return view('department.show', compact('department', 'employees'));
    }
}
