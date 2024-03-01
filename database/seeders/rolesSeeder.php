<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    Role::create(['name'=>'student']);
    Role::create(['name'=>'hod_cs']);
    Role::create(['name'=>'hod_eed']);
    Role::create(['name'=>'hod_mth']);
    Role::create(['name'=>'faculty']);
    Role::create(['name'=>'examDep']);
    }
}
