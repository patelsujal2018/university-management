<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => 'India',
                'code' => 'IND'
            ],
            [
                'name' => 'United States',
                'code' => 'USA'
            ],
            [
                'name' => 'United Kingdom',
                'code' => 'UK'
            ],
            [
                'name' => 'Australia',
                'code' => 'AUS'
            ]
        ];

        foreach ($countries as $country) {
            \App\Models\Country::create($country);
        }
    }
}
