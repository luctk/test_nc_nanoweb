<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function displayEmployeeTree()
    {
        $rootEmployee = Employee::whereNull('manager_id')->first();
        if ($rootEmployee) {
            $this->displaySubtree($rootEmployee, 0);
        }
    }

    private function displaySubtree($employee, $level)
    {
        $indentation = str_repeat('-', $level);
        echo $indentation.$employee->name.'('.$employee->taikhoan .')'. "số điểm:".$employee->tinhTongDiem()."<br>";
        foreach ($employee->employees as $subEmployee) {
            $this->displaySubtree($subEmployee, $level + 1);
        }
    }

}
