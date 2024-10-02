<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $primaryKey = 'ShiftID';
    protected $fillable = ['Name', 'StartTime', 'EndTime'];

    public function employeeHistories()
    {
        return $this->hasMany(History::class, 'ShiftID');
    }
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_department_history', 'ShiftID', 'BusinessEntityID');
    }
}
