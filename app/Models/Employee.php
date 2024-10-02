<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'BusinessEntityID';

    protected $fillable = [
        'NationalIDNumber',
        'LoginID',
        'JobTitle',
        'BirthDate',
        'MaritalStatus',
        'Gender',
        'HireDate',
        'OrganizationNode',
        'OrganizationLevel',
        'VacationHours',
        'SickLeaveHours',
    ];

    public function employeeDepartmentHistories()
    {
        return $this->hasMany(History::class, 'employee_id');
    }

    public function getId()
    {
        return $this->attributes['BusinessEntityID'];
    }
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'employee_department_history', 'BusinessEntityID', 'DepartmentID');
    }
    public function shifts()
    {
        return $this->belongsToMany(Shift::class, 'employee_department_history', 'BusinessEntityID', 'ShiftID');
    }


}
