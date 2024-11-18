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
        Schema::create('university_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('course_id');
            $table->integer('fees');
            $table->date('intake');
            $table->integer('duration')->comment('in months');
            $table->string('scholarships');
            $table->tinyInteger('entry_requirements')->comment('1 = postgraduate, 2 = undergraduate')->default(1);
            $table->tinyInteger('language_requirements')->comment('1 = IELTS, 2 = TOEFL')->default(1);
            $table->tinyInteger('mode_of_study')->comment('1 = Full-time, 2 = Part-time')->default(1);
            $table->bigInteger('campus_location_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('univerity_courses');
    }
};
