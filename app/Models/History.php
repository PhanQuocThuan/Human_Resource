<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'employee_department_history';

    protected $fillable = [
        'BusinessEntityID',
        'DepartmentID',
        'ShiftID'
    ];

    public function employee()
    {
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
