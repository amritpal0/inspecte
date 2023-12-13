<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function wishlist()
  {
    return $this->hasMany('App\Models\Wishlist', 'productid');
  }

  public function attr()
  {
    return $this->hasMany('App\Models\ProductAttributes', 'product_id');
  }

  public function gallery()
  {
    return $this->hasMany('App\Models\ProductImages', 'product_id');
  }

  public function vehicle()
  {
    return $this->hasMany('App\Models\Vehicles', 'product_id');
  }

  public function category()
  {
      return $this->belongsTo(ProductCategory::class, 'category_id');
  }
  

}
