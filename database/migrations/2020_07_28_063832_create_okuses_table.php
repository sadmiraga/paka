<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOkusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('okuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

            //SKUPINA foreign key
            $table->unsignedInteger('skupinaID')->unsigned();
            $table->foreign('skupinaID')->references('id')->on('skupinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('okuses');
    }
}
