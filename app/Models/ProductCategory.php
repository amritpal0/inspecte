<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public function productDetail()
  {
   return $this->hasMany('App\Models\Product', 'category_id');
  }
}
