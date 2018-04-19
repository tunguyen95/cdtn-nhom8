<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = "products";

    public static function newProduct() {
    	return self::limit(8)
    				->orderBy('id', 'desc')
    				->get();
    }
}
