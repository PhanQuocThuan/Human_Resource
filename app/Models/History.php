<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'employee_department_history';    //chỉ định bảng(1)

    protected $fillable = [//cho phép tạo hoặc cập nhật lại các trường
        'BusinessEntityID',
        'DepartmentID',
        'ShiftID'
    ];

    public function employee()//kn&kc(khóa ngoại/khóa chính)
    {//                                              của bảng 1      kc của bảng employees
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
