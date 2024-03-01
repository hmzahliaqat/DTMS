<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            'Mathematisalmns lacs',
            'Phydadadsics',
            'Chemdadadistry',
            'Bioldadaogy',
            'tesdadt',
            'testcsac course 1',
            'testcsac course 323',
            'testcsac course4424',
            'testcsac course42424',
            'testcsac course424',
            'testcsac course4242',
            'testcsac course4242',
            'testcsac course4242',
            'testcsac course424',
            'testcsac course422',
            'testcsac coursefdv',
            'testcsac course44343',
            'testcsac course4334',
            'testcsac course434',
            'testcsac course4343',
            'testcsac course4343',
            'testcsac course4434',
            'testcsac course43443',
            'testcsac cours434e',
            'testcsac course43443',
            'testcsac course4344343',
            'testcsac course433434',
            'testcsac course4344343',
            'testcsac course6565',
            'testcsac course656',
            'testcsac course34y6',
            'testcsac course5323',
            'testcsac course323634',
            'testcsac course4y73',
            'testcsac course54122',
            'testcsac course663542',
            'testcsac course435353',


            // Add more course names as needed
        ];

        $ins=[
            '95',
            '96',
            '97',
            '98',
            '99',
            '100',
            '101',


        ];

        foreach ($courses as $courseName) {
            // Check if the course name already exists
            $existingCourse = DB::table('courses')->where('courseName', $courseName)->first();

            // Insert the course name if it doesn't exist
            if (!$existingCourse) {
                DB::table('courses')->insert([
                    'courseName' => $courseName,
                    'courseCode'=>3,
                    'instructor'=>$ins[rand(0,6)],
                    'enrolledStudents'=>0,
                    'courseStatus'=>1,
                    'discription'=>'dskds dsvhddbksj shdbk bh skb kds',
                ]);
            }
        }

    }
}
