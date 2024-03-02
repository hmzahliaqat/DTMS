<?php

Namespace Database\Seeders;

use App\Models\departments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        departments::create([
            'DepartmentName'=>'Cs',
        ]);
        departments::create([
            'DepartmentName'=>'EE',
        ]);
        departments::create([
            'DepartmentName'=>'Mth',
        ]);
    }
}
