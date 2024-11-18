<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityCourse extends Model
{
    use HasFactory;

    protected $table = 'university_courses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'university_id',
        'course_id',
        'fees',
        'intake',
        'duration',
        'scholarships',
        'entry_requirements',
        'language_requirements',
        'mode_of_study',
        'campus_location_id',
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function campus_location()
    {
        return $this->hasOne('App\Models\Country', 'id', 'campus_location_id');
    }
}
