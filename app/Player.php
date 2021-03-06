<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome'];

    protected $dates = ['deleted_at'];

    /*public function games() {
        return $this->hasMany('App\Game');
    } */

    public function game() {
        return $this->belongsTo('App\Game');
    }

}
