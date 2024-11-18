<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Facility;
use App\Models\University;
use App\Models\UniversityCourse;
use App\Models\UniversityFacility;
use App\Models\Accreditation;
use App\Models\Country;
use Carbon\Carbon;

class UniveritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 100; $i++) {
            $university = University::create([
                'name' => "University $i",
                'address' => "University $i address",
                'website' => "https://univerity$i.com",
                'phone' => '123456789',
                'country_id' => Country::all()->random()->id,
                'ranking' => mt_rand(1, 100),
                'established_date' => Carbon::today()->subDays(mt_rand(1, 100)),
                'description' => "University $i description",
                'accreditation_id' => Accreditation::all()->random()->id,
            ]);

            Course::inRandomOrder()->take(3)->each(function ($course) use ($university) {
                $durations = [12, 24, 36, 48];
                $duration_key = array_rand($durations);
                UniversityCourse::create([
                    'university_id' => $university->id,
                    'course_id' => $course->id,
                    'fees' => mt_rand(1000000 , 9000000),
                    'intake' => Carbon::today()->addDays(mt_rand(1, 100)),
                    'duration' => $durations[$duration_key],
                    'scholarships' => 'Scholarship',
                    'entry_requirements' => mt_rand(1, 2),
                    'language_requirements' => mt_rand(1, 2),
                    'mode_of_study' => mt_rand(1, 2),
                    'campus_location_id' => Country::all()->random()->id,
                ]);
            });

            Facility::inRandomOrder()->take(3)->each(function ($facility) use ($university) {
                UniversityFacility::create([
                    'university_id' => $university->id,
                    'facility_id' => $facility->id,
                ]);
            });
        }
    }
}
