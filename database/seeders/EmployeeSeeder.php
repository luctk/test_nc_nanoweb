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
        $employees = [
            [
                'name' => 'Lực',
                'taikhoan' => 10,
                'subordinates' => [
                    [
                        'name' => 'Lực 1',
                        'taikhoan' => 15,
                        'subordinates' => [],
                    ],
                    [
                        'name' => 'Lực 2',
                        'taikhoan' => 10,
                        'subordinates' => [
                            [
                                'name' => 'Lực 3',
                                'taikhoan' => 5,
                                'subordinates' => [],
                            ],
                            [
                                'name' => 'Lực 4',
                                'taikhoan' => 3,
                                'subordinates' => [],
                            ],
                        ],
                    ],


                ],
            ],
        ];

        foreach ($employees as $employeeData) {
            $this->createEmployee($employeeData);
        }

    }

    private function createEmployee($data, $manager = null)
    {
        $employee = new Employee([
            'name' => $data['name'],
            'taikhoan' => $data['taikhoan'],
        ]);

        if ($manager) {
            $manager->employees()->save($employee);
        } else {
            $employee->save();
        }

        foreach ($data['subordinates'] as $subordinateData) {
            $this->createEmployee($subordinateData, $employee);
        }
    }
}
