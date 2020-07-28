<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            //podatki o kupcu
            $table->string('ime');
            $table->string('priimek');
            $table->string('telefonskaStevilka');
            $table->string('elektronskiNaslov');
            $table->string('nacinPlacila');

            //podatki o torti

            $table->integer('steviloTort');
            //foreign key za SKUPINO torte
            $table->unsignedInteger('skupinaID')->unsigned();
            $table->foreign('skupinaID')->references('id')->on('skupinas');

            //foreign key za OKUS torte
            $table->unsignedInteger('okusID')->unsigned();
            $table->foreign('okusID')->references('id')->on('okuses');

            //foreign key za PRELIV torte
            $table->unsignedInteger('prelivID')->unsigned();
            $table->foreign('prelivID')->references('id')->on('prelivs');

            //foreign key za OBLIKO torte
            $table->unsignedInteger('oblikaID')->unsigned();
            $table->foreign('oblikaID')->references('id')->on('oblikas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
