<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            [
                'title' => 'Student Parking'
            ],
            [
                'title' => 'Library'
            ],
            [
                'title' => 'Student Bus Pass'
            ],
            [
                'title' => 'Cafeteria'
            ],
            [
                'title' => 'Tennis Courts'
            ]
        ];

        foreach ($facilities as $f) {
            \App\Models\Facility::create($f);
        }
    }
}
