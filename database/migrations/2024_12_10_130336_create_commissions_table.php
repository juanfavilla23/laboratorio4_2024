<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration
{
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->string('aula');
            $table->string('horario');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('professor_id')->nullable(); // Permitir nulos si es opcional
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commissions');
    }
}
