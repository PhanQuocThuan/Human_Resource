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
        $viewData["title"] = "Quản Lý Ca Làm Việc";
        $viewData["shifts"] = Shift::all(); // Lấy danh sách tất cả ca làm việc

        return view('admin.shifts.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $shift = Shift::findOrFail($id);
        $employees = Employee::all(); // Lấy danh sách nhân viên

        $viewData = [
            'title' => 'Shift Details: ' . $shift->Name,
            'shift' => $shift,
            'employees' => $employees, // Truyền danh sách nhân viên vào view
        ];

        return view('admin.shifts.show')->with('viewData', $viewData);
    }



    public function create()
    {
        return view('admin.shifts.create')->with('title', 'Add New Shift');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|max:255',
            'StartTime' => 'required',
            'EndTime' => 'required',
        ]);

        Shift::create($request->only(['Name', 'StartTime', 'EndTime']));
        return redirect()->route('admin.shifts.index')->with('success', 'Shift added successfully!');
    }

    public function edit($id)
    {
        $shift = Shift::findOrFail($id);
        return view('admin.shifts.edit', compact('shift'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|max:255',
            'StartTime' => 'required',
            'EndTime' => 'required',
        ]);

        $shift = Shift::findOrFail($id);
        $shift->update($request->only(['Name', 'StartTime', 'EndTime']));
        return redirect()->route('admin.shifts.index')->with('success', 'Shift updated successfully!');
    }

    public function destroy($id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();
        return redirect()->route('admin.shifts.index')->with('success', 'Shift deleted successfully!');
    }
    public function assign(Request $request, $shiftId)
    {
        $request->validate([
            'employee_ids' => 'required|array',
            'employee_ids.*' => 'exists:employees,BusinessEntityID', // Kiểm tra tồn tại
        ]);
        $shift =Shift::findOrFail($shiftId);

        // lưu thông tin phân công ca làm việc vào bảng employee_department_history
        foreach ($request->employee_ids as $employeeId) {
            History::create([
                'BusinessEntityID' => $employeeId,
                'ShiftID' => $shiftId,
                'created_at' => now(), 
                'updated_at' => now(), 
            ]);
        }

        return redirect()->route('admin.shifts.index')->with('success', 'Shift assigned successfully!');
    }


    public function storeAssignment(Request $request, $id)
    {
        $shift = Shift::findOrFail($id);
        $shift->employees()->sync($request->input('employees')); // Assign employees
        return redirect()->route('admin.shifts.index')->with('success', 'Shift assignments updated!');
    }

}
