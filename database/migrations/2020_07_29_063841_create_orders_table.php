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
            $table->string('ime')->nullable();
            $table->string('priimek')->nullable();
            $table->string('telefonskaStevilka')->nullable();
            $table->string('elektronskiNaslov')->nullable();
            $table->string('nacinPlacila')->nullable();

            //podatki o statusu narocila
            $table->string('completed')->default('no');
            $table->string('shipped')->default('no');
            $table->integer('price')->default(0);

            //podatki o torti
            $table->string('napis')->nullable();
            $table->string('komentar')->nullable();


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

            //foreign key za OKRASKE
            $table->unsignedInteger('okrasID')->unsigned();
            $table->foreign('okrasID')->references('id')->on('okraskis');

            //foreign key za STEVILO KOSOV
            $table->unsignedInteger('partsID')->unsigned();
            $table->foreign('partsID')->references('id')->on('parts');
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
