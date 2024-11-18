<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UniversityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('admin.login');
// });

Route::get('/admin', [AuthController::class, 'loginPage'])->name('login');
Route::post('/admin', [AuthController::class, 'loginProcess'])->name('login.process');

Route::group(['middleware' => ['auth', 'prevent-back-history']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/university', UniversityController::class);
    Route::get('/bookings', [UniversityController::class, 'bookings'])->name('admin.bookings');
});


Route::get('/', [UniversityController::class, 'university_search'])->name('student.university.search');
Route::post('/universities', [UniversityController::class, 'university_search_process'])->name('student.university.search.process');
Route::get('/student/university/{id}', [UniversityController::class, 'university_details'])->name('student.university.details');

Route::get('/student', [AuthController::class, 'studentLoginPage'])->name('student.login');
Route::post('/student', [AuthController::class, 'studentLoginProcess'])->name('student.login.process');

Route::group(['middleware' => ['auth:student', 'prevent-back-history']], function () {
    Route::get('/student/logout', [AuthController::class, 'studentLogout'])->name('student.logout');
    Route::get('/student/university/{university_id}/{course_id}', [UniversityController::class, 'university_course_booking'])->name('student.university.course.booking');
    Route::post('/student/university-course-booking', [UniversityController::class, 'university_course_booking_process'])->name('student.university.course.booking.process');
});