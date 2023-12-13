<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postcategory extends Model
{
    use HasFactory;
    
     public function droppost()
  {
   return $this->hasMany('App\Models\Post', 'postcategory');
  }
}
