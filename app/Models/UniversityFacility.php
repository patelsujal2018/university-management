<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityFacility extends Model
{
    use HasFactory;

    protected $table = 'university_facilities';
    protected $primaryKey = 'id';

    protected $fillable = [
        'university_id',
        'facility_id',
    ];
}
