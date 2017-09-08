<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('course_assignment', function (Blueprint $table){
            $table->integer('course_id');
            $table->integer('Assignment_id');
            $table->foreign('course_id')->references('course_id')->on('course');
            $table->foreign('Assignment_id')->references('id')->on('assignment');
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
