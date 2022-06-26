<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examination_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examination_id')->references('id')->on('examinations');
            $table->foreignId('question_id')->references('id')->on('questions');
            $table->string('answer')->nullable();
            $table->string('score')->nullable();
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
        Schema::dropIfExists('examination_questions');
    }
}
