<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('course_teacher', function (Blueprint $table) {
            $table->integer('course_id');
            $table->integer('teacher_id');
            $table->integer('data_id');

            $table->foreign('course_id')->references('course_id')->on('course');
            $table->foreign('teacher_id')->references('id')->on('teacher');
            $table->foreign('data_id')->references('data_id')->on('data');
            $table->rememberToken();
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('course_teacher');
    }
}
