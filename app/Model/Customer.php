<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 't_customers';

    protected $guarded = [
        'created_at', 'updated_at',
    ];
}
