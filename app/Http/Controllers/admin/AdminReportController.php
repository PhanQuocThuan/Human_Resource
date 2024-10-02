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
        $departments = Department::all();
        $shifts = Shift::all();
        $viewData = [
            'title' => 'Admin Page - Report',
            'departments' => $departments,
            'shifts' => $shifts,
            'results' => [],
        ];

        return view('admin.reports.index')->with('viewData', $viewData);
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

    public function filter(Request $request)
    {
        $departmentId = $request->input('department_id');
        $shiftId = $request->input('shift_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = History::with(['department', 'shift', 'employee']);
        if (!empty($departmentId)) {
            $query->where('DepartmentID', $departmentId);
        }
        if (!empty($shiftId)) {
            $query->where('ShiftID', $shiftId);
        }
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('StartDate', [$startDate, $endDate]);
        }
        $filteredResults = $query->get();
        $departments = Department::all();
        $shifts = Shift::all();

        return view('admin.reports.index', [
            'title' => 'Admin Page - Report',
            'results' => $filteredResults,
            'departments' => $departments,
            'shifts' => $shifts,
        ]);
    }

}
