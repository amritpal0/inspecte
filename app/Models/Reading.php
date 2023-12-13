<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Reading extends Model
{
    use HasFactory;
     public function reading()
    {
        return $this->belongsTo('App\Models\Post', 'reading_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
