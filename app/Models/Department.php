<?php

namespace App\Models;

use App\Http\Controllers\HistoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'DepartmentID';
    
    protected $fillable = [
        'Name',
        'GroupName',
    ];

    public function employeeDepartmentHistories()
    {
        return $this->hasMany(HistoryController::class, 'department_id');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_department_history', 'DepartmentID', 'BusinessEntityID');
    }


}

