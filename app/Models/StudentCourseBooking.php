<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourseBooking extends Model
{
    use HasFactory;

    protected $table = 'student_course_bookings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'student_id',
        'university_course_id',
        'university_id',
        'estimated_budget',
        'start_date',
        'case_type',
        'mode_of_study',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function universityCourse()
    {
        return $this->belongsTo(UniversityCourse::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
