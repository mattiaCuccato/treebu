<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->string("comune")->nullable();
            $table->string("foto")->nullable();
            $table->integer("dimensione")->nullable();
            $table->string("foglio_catastale")->nullable();
            $table->string("mappa_catastale")->nullable();
            $table->string("parcella_catastale")->nullable();
            $table->string("tipologia_terreno")->nullable();
            $table->string("tipo_arrigazione")->nullable();
            $table->string("tipo_offerta")->nullable();
            $table->string("canone_offerta")->nullable();
            $table->boolean("disponibile_subito")->nullable();
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
        Schema::dropIfExists('lands');
    }
}
