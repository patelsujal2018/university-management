<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'MBA',
                'type' => 1,
            ],
            [
                'name' => 'CCNA',
                'type' => 1,
            ],
            [
                'name' => 'Cyber Security',
                'type' => 1,
            ],
            [
                'name' => 'Data Analytics',
                'type' => 1,
            ]
        ];

        foreach ($courses as $c) {
            \App\Models\Course::create($c);
        }
    }
}
