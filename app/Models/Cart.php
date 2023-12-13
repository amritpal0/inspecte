<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function product_detail()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
    public function attr()
    {
        return $this->belongsTo(ProductAttributes::class, 'product_attr_id');
    }
}
