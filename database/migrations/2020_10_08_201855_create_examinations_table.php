<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->foreignId('exam_id')->references('id')->on('exams');
            $table->foreignId('student_id')->references('id')->on('students');
            $table->string('time_remaining')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('result')->default(false);
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
        Schema::dropIfExists('examinations');
    }
}
