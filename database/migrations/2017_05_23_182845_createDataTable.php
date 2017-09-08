<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('data', function (Blueprint $table) {
            $table->increments('data_id');
            $table->integer('File_id')->default(null);
            $table->integer('Assignment_id')->default(null);
            $table->integer('Text_id')->default(null);
            $table->integer('quiz_id')->default(null);
            $table->enum('Validity',['enable','disable']);
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
        Schema::dropIfExists('data');
    }
}
