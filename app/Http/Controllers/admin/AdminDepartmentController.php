<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Depends;

class AdminDepartmentController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Departments Management";
        $viewData["departments"] = Department::all();//lấy toàn bộ sanh sách department
        return view('admin.departments.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        //truy xuất dữ liệu lấy liên kết các mối quan hệ như 1 nhiều, nhiều nhiều
        //employees được định nghĩa trong Model 
        $department = Department::with(['employees', 'employees.shifts'])->findOrFail($id);
        
        $viewData = [
            "title" => "Employees in " . $department->Name,//tên phòng ban
            "department" => $department,
            "shifts" => [] // khởi tạo mảng
        ];
        
        // lấy danh sách ca làm việc của nhân viên trong department
        foreach ($department->employees as $employee) {
            foreach ($employee->shifts as $shift) {
                $viewData["shifts"][$shift->ShiftID] = $shift; // lưu ca làm việc vào mảng
            }
        }

        return view('admin.departments.show')->with("viewData", $viewData);
    }


    public function create()
    {
        $viewData = [
            "title" => "Add New Department"//tiêu đề
        ];
        return view('admin.departments.create')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        //thông tin nhập vào
        $request->validate([
            "Name" => "required|max:100",
            "GroupName" => "required|max:255",
        ]);

        // tạo nhân viên với dữ liệu từ form
        Department::create($request->only([
            "Name", 
            "GroupName", 
            'created_at' => now(), 
        ]));
        //trả đối tượng về 1 hướng cụ thể (redirect) hướng này là route
        return redirect()->route('admin.departments.index')->with('success', 'Department added successfully!');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $viewData = [
            "title" => "Edit Department",
            "department" => $department
        ];
        return view('admin.departments.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        //nhập thông tin vào
        $request->validate([
            "Name" => "required|max:100",
            "GroupName" => "required|max:255",
        ]);
    
        $department = Department::findOrFail($id);//tìm đối tượng cần đổi
        $department->ModifiedDate = now();
        $department->update($request->only([//thay đổi thông tin từ form
            "Name", 
            "GroupName", 
            'updated_at' => now(), 
        ]));
        //trả đối tượng về 1 hướng cụ thể (redirect) hướng này là route
        return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully!');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id); // tìm nhân viên cần xóa
        $department->delete(); // thực hiện xóa nhân viên
        //trả đối tượng về 1 hướng cụ thể (redirect) hướng này là route
        return redirect()->route('admin.departments.index')->with('success', 'Department deleted successfully!');
    }
    public function employee($id)
    {
        $department = Department::findOrFail($id);

        // lấy danh sách nhân viên thuộc phòng ban
        $employees = $department->employees()->get(); 

        $viewData = [
            'title' => 'Department: ' . $department->Name,
            'department' => $department,
            'employees' => $employees // Đảm bảo đã truyền danh sách employees
        ];

        return view('admin.departments.show')->with('viewData', $viewData);
    }

}
