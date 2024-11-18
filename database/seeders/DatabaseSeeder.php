<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     CountrySeeder::class,
        //     AccreditationSeeder::class,
        //     FacilitySeeder::class,
        //     CourseSeeder::class,
        //     UniveritySeeder::class
        // ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'administrator',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make(123456789),
        //     'role' => 1
        // ]);

        // \App\Models\Student::create([
        //     'first_name' => 'test',
        //     'last_name' => 'test',
        //     'phone' => '9876543210',
        //     'email' => 'test@gmail.com',
        //     'password' => Hash::make(123456789)
        // ]);
    }
}
