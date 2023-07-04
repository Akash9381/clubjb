<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function GetEmployee()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function GetEmployeePicture()
    {
        return $this->hasMany(EmployePictureDocument::class, 'employee_id', 'employee_id');
    }
    public function GetEmployeeAadhar()
    {
        return $this->hasMany(EmployeAadharDocument::class, 'employee_id', 'employee_id');
    }
    public function GetEmployeeCV()
    {
        return $this->hasMany(EmployeCVDocument::class, 'employee_id', 'employee_id');
    }
    public function GetEmployeePassPort()
    {
        return $this->hasMany(EmployeePassportDocument::class, 'employee_id', 'employee_id');
    }
    public function GetEmployeeDriving()
    {
        return $this->hasMany(EmployeDrivingDocument::class, 'employee_id', 'employee_id');
    }
    public function GetEmployeeAgreement()
    {
        return $this->hasMany(EmployeeAgrementDocument::class, 'employee_id', 'employee_id');
    }
}
