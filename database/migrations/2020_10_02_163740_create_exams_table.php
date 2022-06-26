<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    
    public function up()
    {
        
        Schema::create('exams', function (Blueprint $table) {
            
            $table->id();
            $table->string('title');
            $table->longText('instructions');
            $table->string('duration');
            $table->string('course')->nullable();
            $table->string('exam_code')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('exams');
    }
}
