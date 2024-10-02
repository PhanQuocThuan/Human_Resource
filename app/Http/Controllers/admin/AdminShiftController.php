<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\History;
use App\Models\Shift;
use Illuminate\Http\Request;

class AdminShiftController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Shifts Manegaments";
        $viewData["shifts"] = Shift::all(); // lấy danh sách tất cả ca làm việc

        return view('admin.shifts.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $shift = Shift::findOrFail($id);//tìm ca làm theo id
        $employees = Employee::all(); // lấy danh sách nhân viên

        $viewData = [
            'title' => 'Shift Details: ' . $shift->Name,
            'shift' => $shift,
            'employees' => $employees,
        ];

        return view('admin.shifts.show')->with('viewData', $viewData);
    }

    public function create()
    {
        return view('admin.shifts.create')->with('title', 'Add New Shift');
    }

    public function store(Request $request)
    {
        //thông tin nhập vào
        $request->validate([
            'Name' => 'required|max:255',
            'StartTime' => 'required',
            'EndTime' => 'required',
        ]);
        //tạo từ những thông tin đã nhập
        Shift::create($request->only(['Name', 'StartTime', 'EndTime', 'updated_at' => now(), ]));
        return redirect()->route('admin.shifts.index')->with('success', 'Shift added successfully!');
    }

    public function edit($id)
    {
        $shift = Shift::findOrFail($id);//tìm ca làm theo id
        return view('admin.shifts.edit', compact('shift'));//chuyền biến (compact) sanng biến view
    }

    public function update(Request $request, $id)
    {
        //nhập thông tin
        $request->validate([
            'Name' => 'required|max:255',
            'StartTime' => 'required',
            'EndTime' => 'required',
        ]);

        $shift = Shift::findOrFail($id);//tìm thông tin theo id
        $shift->update($request->only(['Name', 'StartTime', 'EndTime']));
        return redirect()->route('admin.shifts.index')->with('success', 'Shift updated successfully!');
    }

    public function destroy($id)
    {
        $shift = Shift::findOrFail($id);//tìm id
        $shift->delete();//xóa từ thông tin đã tìm
        return redirect()->route('admin.shifts.index')->with('success', 'Shift deleted successfully!');
    }
    public function assign(Request $request, $shiftId)
    {
        $request->validate([
            'employee_ids' => 'required|array',
            'employee_ids.*' => 'exists:employees,BusinessEntityID', // kiểm tra tồn tại
        ]);
        $shift =Shift::findOrFail($shiftId);

        // lưu thông tin phân công ca làm việc có thể xem ở history
        foreach ($request->employee_ids as $employeeId) {
            History::create([
                'BusinessEntityID' => $employeeId,
                'ShiftID' => $shiftId,
                'created_at' => now(), 
                
            ]);
        }

        return redirect()->route('admin.shifts.index')->with('success', 'Shift assigned successfully!');
    }


    public function storeAssignment(Request $request, $id)
    {
        $shift = Shift::findOrFail($id);//chọn id
        $shift->employees()->sync($request->input('employees')); // phân công công việc
        return redirect()->route('admin.shifts.index')->with('success', 'Shift assignments updated!');
    }

}
