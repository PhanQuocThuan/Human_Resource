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
        // Lấy bản ghi theo ID
        $history = History::findOrFail($id);
        // Truyền thông tin vào view chỉnh sửa
        return view('admin.histories.edit', compact('history'));
    }

    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'StartDate' => 'required|date',
            'EndDate' => 'required|date|after_or_equal:StartDate',
            // Thêm các quy tắc xác thực khác nếu cần
        ]);

        // Cập nhật bản ghi
        $history = History::findOrFail($id);
        $history->update($request->all());

        return redirect()->route('admin.histories.index')->with('success', 'Cập nhật lịch sử thành công!');
    }
    public function showHistory($employeeId)
    {
        $history = History::with('department', 'shift')
            ->where('BusinessEntityID', $employeeId)
            ->orderBy('StartDate', 'desc')
            ->get();

        $employee = Employee::findOrFail($employeeId);

        $viewData = [
            'title' => 'Lịch sử thay đổi của nhân viên ' . $employee->NationalIDNumber,
            'employee' => $employee,
            'history' => $history,
        ];

        return view('admin.histories.show')->with('viewData', $viewData);
    }
}
