<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     /*   Schema::create('student_course', function (Blueprint $table){
            $table->integer('course_id');
            $table->integer('Student_id');
            $table->foreign('course_id')->references('course_id')->on('course');
            $table->foreign('Student_id')->references('id')->on('student');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
