<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\postcategory;

class Post extends Model
{
    use HasFactory;

    public function images()
  {
   return $this->hasMany('App\PostImages', 'post_id');
  }

  public function category()
  {
    return $this->belongsTo('App\Models\postcategory', 'postcategory');
  }
}
