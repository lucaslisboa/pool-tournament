<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    protected $fillable = ['data_jogo','pontuacao_jogador_1','pontuacao_jogador_2','player_id_1','player_id_2'];

    protected $dates = ['deleted_at'];

    public function game() {
        return $this->belongsTo('App\Player');
    }
}
