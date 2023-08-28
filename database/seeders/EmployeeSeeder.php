<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rootEmployee=Employee::create([
            'name'=>'trinh khac luc',
        ]);
        $emloyee1=Employee::create([
            'name'=>'trinh khac luc 1',
            'manager_id'=>$rootEmployee->id
        ]);
        $emloyee2=Employee::create([
            'name'=>'trinh khac luc 2',
            'manager_id'=>$rootEmployee->id
        ]);
        $emloyee3=Employee::create([
            'name'=>'trinh khac luc 3',
            'manager_id'=>$emloyee1->id
        ]);
        $emloyee4=Employee::create([
            'name'=>'trinh khac luc 4',
            'manager_id'=>$emloyee3->id
        ]);
        $emloyee5=Employee::create([
            'name'=>'trinh khac luc 5',
            'manager_id'=>$emloyee3->id
        ]);
    }
}
