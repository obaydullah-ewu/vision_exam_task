<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_students');
    }
};
