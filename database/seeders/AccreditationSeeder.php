<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccreditationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accreditations = [
            [
                'name' => 'GTU'
            ],
            [
                'name' => 'CBSCE'
            ]
        ];

        foreach ($accreditations as $a) {
            \App\Models\Accreditation::create($a);
        }
    }
}
