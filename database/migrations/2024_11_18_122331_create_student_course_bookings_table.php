<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_course_bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id');
            $table->bigInteger('university_course_id');
            $table->bigInteger('university_id');
            $table->integer('estimated_budget');
            $table->date('start_date');
            $table->tinyInteger('case_type')->default(1)->comment('1 = single, 2 = Spouse');
            $table->tinyInteger('mode_of_study')->default(1)->comment('1 = Fulltime, 2 = Parttime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_course_bookings');
    }
};
