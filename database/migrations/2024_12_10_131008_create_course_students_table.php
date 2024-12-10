<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('course_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('commission_id');
            $table->foreign('commission_id')->references('id')->on('commissions')->onDelete('cascade');
            $table->timestamps();
            // Asegurarse de que un estudiante solo puede estar en una comisión específica dentro de un curso
            $table->unique(['student_id', 'course_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_students');
    }
}
