<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Shifts";
        $viewData["shifts"] = Shift::all();
        return view('shift.index')->with("viewData", $viewData);
    }

    public function show($ShiftID)
    {
        // Get shift information
        $shift = Shift::findOrFail($ShiftID);

        // Get employees assigned to the shift
        $employees = History::where('ShiftID', $ShiftID)
            ->with('employee') // Fetch the related employee data
            ->get()
            ->pluck('employee'); // Pluck only the employee details

        // Return the view with shift and employee data
        return view('shift.show', compact('shift', 'employees'));
    }


}
