<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GamePlayHistory extends Model
{
    protected $table = 't_game_play_history';

    protected $dates = ['played_at'];

    protected $guarded = [
        'created_at', 'updated_at',
    ];
}
