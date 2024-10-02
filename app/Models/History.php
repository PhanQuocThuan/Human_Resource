<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'employee_department_history';//chỉ định bảng

    protected $fillable = [//cho phép tạo hoặc cập nhật lại các trường
        'BusinessEntityID',
        'DepartmentID',
        'ShiftID'
    ];

    public function employee()
    {//                                           khóa ngoại this     khóa chính của employees
        return $this->belongsTo(Employee::class, 'BusinessEntityID', 'BusinessEntityID');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID', 'DepartmentID');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'ShiftID', 'ShiftID');
    }
}
