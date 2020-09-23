<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 't_product_images';

    protected $guarded = [
        'created_at', 'updated_at',
    ];
}
