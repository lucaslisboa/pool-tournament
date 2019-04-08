<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('data_jogo');
            $table->integer('pontuacao_jogador_1');
            $table->integer('pontuacao_jogador_2');
            $table->integer('player_id_1')->unsigned();
            $table->foreign('player_id_1')->references('id')->on('players')->onDelete('cascade');
            $table->integer('player_id_2')->unsigned();
            $table->foreign('player_id_2')->references('id')->on('players')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
