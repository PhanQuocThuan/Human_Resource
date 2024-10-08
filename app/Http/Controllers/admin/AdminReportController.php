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
    public function index (Request $request){
        // $departments = Department::all();
        // $shifts = Shift::all();
        // $viewData = [
        //     'title' => 'Admin Page - Report',
        //     'departments',
        //     'shifts',
        //     'results' => [],
        // ];

        // return view('admin.reports.index')->with('viewData', $viewData);
        $departmentId = $request->input('department_id');//lấy từ name trong trang index
        $shiftId = $request->input('shift_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = History::with(['department', 'shift', 'employee']);//các function tạo trong Histoty
        if (!empty($departmentId)) {//xác định department có rỗng hay không nếu không sẽ truy vấn từ Model History
            $query->where('DepartmentID', $departmentId);//nếu không rỗng thì thực hiện lệnh
        }
        if (!empty($shiftId)) {
            $query->where('ShiftID', $shiftId);
        }
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('StartDate', [$startDate, $endDate]);
        }
        $filteredResults = $query->get();//truy vấn và lấy toàn bộ dữ liệu phù hợp đã chọn từ các if
        $departments = Department::all();
        $shifts = Shift::all();

        return view('admin.reports.index', [//xuất dữ liệu qua trang index
            'title' =>'Page Admin - Report',
            'results' => $filteredResults,
            'departments' => $departments,
            'shifts' => $shifts,
        ]);
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
        $departments = Department::with('employees') -> get();//lấy toàn bộ danh phòng ban thông qua quan hệ employees trong Model
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

    // public function filter(Request $request)
    // {
    //     $departmentId = $request->input('department_id');
    //     $shiftId = $request->input('shift_id');
    //     $startDate = $request->input('start_date');
    //     $endDate = $request->input('end_date');

    //     $query = History::with(['department', 'shift', 'employee']);
    //     if (!empty($departmentId)) {
    //         $query->where('DepartmentID', $departmentId);
    //     }
    //     if (!empty($shiftId)) {
    //         $query->where('ShiftID', $shiftId);
    //     }
    //     if (!empty($startDate) && !empty($endDate)) {
    //         $query->whereBetween('StartDate', [$startDate, $endDate]);
    //     }
    //     $filteredResults = $query->get();
    //     $departments = Department::all();
    //     $shifts = Shift::all();

    //     return view('admin.reports.index', [
    //         'title' =>'Page Admin - Report',
    //         'results' => $filteredResults,
    //         'departments' => $departments,
    //         'shifts' => $shifts,
    //     ]);
    // }

}
