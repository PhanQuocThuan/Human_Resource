<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\History;
use Illuminate\Http\Request;

class AdminHistoryController extends Controller
{
    public function index()
    {
        // Lấy tất cả các bản ghi từ bảng employee_department_history
        $histories = History::with(['department', 'shift'])->get();

        return view('admin.histories.index', compact('histories'));
    }

    public function edit($id)
    {
        // lấy lịch sử theo id
        $history = History::findOrFail($id);
        // truyền thông tin vào view chỉnh sửa
        return view('admin.histories.edit', compact('history'));
    }

    public function update(Request $request, $id)
    {
        // nhập thông tin
        $request->validate([
            'StartDate' => 'required|date',
            'EndDate' => 'required|date|after_or_equal:StartDate',
            
        ]);

        // cập nhật bản ghi
        $history = History::findOrFail($id);
        $history->update($request->all());

        return redirect()->route('admin.histories.index')->with('success', 'Cập nhật lịch sử thành công!');
    }
    public function showHistory($employeeId)
    {
        $history = History::with('department', 'shift')//thông qua Model history sử dụng các mối quan hệ (function)
            ->where('BusinessEntityID', $employeeId)
            ->orderBy('StartDate', 'desc')//sắp sếp
            ->get();

        $employee = Employee::findOrFail($employeeId);

        $viewData = [
            'title' => 'Employee Change History: ' . $employee->BusinessEntityID,
            'employee' => $employee,
            'history' => $history,
        ];

        return view('admin.histories.show')->with('viewData', $viewData);
    }
}
