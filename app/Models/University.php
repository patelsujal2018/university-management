<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $table = 'universities';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'address',
        'website',
        'phone',
        'country_id',
        'ranking',
        'established_date',
        'description',
        'accreditation_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function accreditation()
    {
        return $this->belongsTo(Accreditation::class);
    }

    public function university_courses()
    {
        return $this->hasMany('App\Models\UniversityCourse', 'university_id', 'id');
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'university_facilities', 'university_id', 'facility_id');
    }
}
