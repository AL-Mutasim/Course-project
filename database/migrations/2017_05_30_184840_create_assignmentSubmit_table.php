<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentSubmitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Assignment_Submit', function (Blueprint $table){
            $table->integer('student_id');
            $table->integer('Assignment_id');
            $table->foreign('student_id')->references('id')->on('student');
            $table->foreign('Assignment_id')->references('id')->on('assignment');
        });
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
