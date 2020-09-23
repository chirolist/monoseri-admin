<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookMark extends Model
{
    protected $table = 't_bookmark';

    protected $guarded = [
        'created_at', 'updated_at',
    ];
}
