<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        function buildTree($employees, $manageId = null)
        {
            $tree = [];
            foreach ($employees as $employee) {
                if ($employee->manager_id == $manageId) {
                    $subordinates = buildTree($employees, $employee->id);
                    $tree[] = [
                        'id' => $employee->id,
                        'name' => $employee->name,
                        'subordinates' => $subordinates
                    ];
                }
            }
            return $tree;
        }

        $tree = buildTree($employees);
        return view('employees.index',compact('tree'));

    }
}
