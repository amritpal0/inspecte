<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shippingdetail;
class Order extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->hasmany(OrderItem::class, 'orderId');
    }
    public function total()
    {
        return $this->hasOne(Payment::class, 'order_id', 'orderId');
    }
    
    public function shipping()
    {
        return $this->belongsTo('App\Models\Shippingdetail', 'shipping_id');
    }
    
}
