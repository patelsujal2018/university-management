<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\UniversityCourse;

class DashboardController extends Controller
{
    public function index()
    {
        $universities = University::count();
        $courses = UniversityCourse::count();
        return view('admin.dashboard',compact('universities','courses'));
    }
}
