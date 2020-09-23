<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 't_products';

    protected $guarded = [
        'created_at', 'updated_at',
    ];

    public function images()
    {
        return $this->hasMany(\App\Model\ProductImage::class, 'product_id');
    }
}
