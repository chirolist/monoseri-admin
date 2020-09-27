<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 't_products';

    protected $guarded = [
        'created_at', 'updated_at',
    ];

    public function images()
    {
        return $this->hasMany(\App\Model\ProductImage::class, 'product_id');
    }
}
