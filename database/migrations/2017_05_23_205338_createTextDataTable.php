<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     /*   Schema::create('text', function (Blueprint $table) {
            $table->integer('course_id');
            $table->longText('text_data');
            //$table->foreign('course_id')->references('course_id')->on('course');
            ///$table->foreign('Text_id')->references('id')->on('text');

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
        //Schema::dropIfExists('text');
    }
}
