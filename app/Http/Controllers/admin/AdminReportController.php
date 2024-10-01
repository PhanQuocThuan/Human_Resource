<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\History;
use App\Models\Shift;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index (){
        $viewData =[
            'title' => 'Admin Page - Report',
        ];

        return view('admin.reports.index') -> with('viewData', $viewData);
    }

    public function employeeReport(){
        $employees = Employee::all();
        $viewData =[
            'title' =>'Employee Report',
            'employees' => $employees,
        ];

        return view('admin.reports.employees') -> with('viewData', $viewData);
    }

    public function departmentReport(){
        $departments = Department::with('employees') -> get();//lấy toàn bộ danh phòng ban và nhân viên
        $viewData =[
            'title' =>'Department Report',
            'departments' => $departments,
        ];
        
        return view('admin.reports.departments') -> with('viewData', $viewData);
    }
    public function shiftReport(){
        $shifts = Shift::with('employees') -> get();
        $viewData =[
            'title' =>'Shift Report',
            'shifts' => $shifts,
        ];
        
        return view('admin.reports.shifts') -> with('viewData', $viewData);
    }

}
