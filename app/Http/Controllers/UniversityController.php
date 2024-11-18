<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\University;
use App\Models\UniversityCourse;
use App\Models\StudentCourseBooking;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = University::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/university/' . $row->id . '" class="edit btn btn-success btn-sm">View</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.university.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $university = University::with('country', 'accreditation', 'university_courses.course', 'facilities')->find($id);
        return view('admin.university.view', compact('university'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function university_search()
    {
        return view('student.university');
    }

    public function university_search_process(Request $request)
    {
        if ($request->ajax()) {
            $data = University::offset(0)->take(5)->get();
            return response()->json($data);
        }
    }

    public function university_details($id)
    {
        $university = University::with('country', 'accreditation', 'university_courses.course', 'facilities')->find($id);
        if (empty($university)) {
            abort(404);
        }
        return view('student.university_details', compact('university'));
    }

    public function university_course_booking($university_id, $course_id)
    {
        if (empty($university_id) || empty($course_id)) {
            abort(404);
        }

        $university_course = UniversityCourse::with('course')->where('university_id', $university_id)->where('course_id', $course_id)->first();
        if (empty($university_course)) {
            abort(404);
        }
        return view('student.university_course_booking', compact('university_course'));
    }

    public function university_course_booking_process(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'university_id' => 'required',
            'university_course_id' => 'required',
            'start_date' => 'required',
            'case_type' => 'required',
            'mode_of_study' => 'required',
        ]);

        $university_course = UniversityCourse::find($request->university_course_id);
        if (empty($university_course)) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            StudentCourseBooking::create([
                'student_id' => $request->student_id,
                'university_id' => $request->university_id,
                'university_course_id' => $request->university_course_id,
                'start_date' => $request->start_date,
                'case_type' => $request->case_type,
                'mode_of_study' => $request->mode_of_study,
                'estimated_budget' => $university_course->fees,
            ]);
            DB::commit();
            return redirect()->back()->with(['message' => 'Course booking successful', 'type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getLine());
            Log::error($e->getMessage());
            DB::rollback();
            return redirect()->back()->with(['message' => 'Course booking failed', 'type' => 'danger']);
        }
    }

    public function bookings(Request $request)
    {
        if ($request->ajax()) {
            $data = StudentCourseBooking::with('student','university', 'universityCourse.course')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.bookings');
    }
}
