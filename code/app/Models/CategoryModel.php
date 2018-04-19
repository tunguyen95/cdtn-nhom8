<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = "categories";

    public static function getCategories_lv1() {
    	return self::select('name', 'id', 'slug')
    				->where('parent_id', 0)
    				->get();
    }

    public static function getCategories_lvCon($parent_id) {
    	return self::select('name', 'id', 'slug')
    				->where('parent_id', $parent_id)
    				->get();
    }
}
