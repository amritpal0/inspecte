<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleInfo extends Model
{
    use HasFactory;

    public function driver()
    {
        return $this->belongsTo('App\Models\DriverInfo', 'user_id');
    }
}
