<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "History";
        $viewData["subtitle"] = "List of Employee Histories";
        $viewData["histories"] = History::all(); // Lấy tất cả lịch sử
        return view('history.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $history = History::findOrFail($id); // Kiểm tra xem bản ghi có tồn tại hay không
        return view('history.show', compact('history'));
    }
}
