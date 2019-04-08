<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    protected $fillable = ['data_jogo','pontuacao_jogador_1','pontuacao_jogador_2','player_id_1','player_id_2'];

    protected $dates = ['deleted_at'];

    public function playerOne() {
        return $this->hasMany('App\Player','player_id_1');
    }

    public function playerTwo() {
        return $this->hasMany('App\Player','player_id_2');
    }

    /*public function player() {
        return $this->belongsTo('App\Player');
    }*/
}
