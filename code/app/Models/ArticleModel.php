<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    protected $table = "articles";

    public function users() {
    	return $this->hasOne("App\Models\UserModel", "id", "author");
    }
}
