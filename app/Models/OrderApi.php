<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderApi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public static function findByOrder (Order $order) : OrderApi {
        return OrderApi::where('order_id', $order->id)->first();
    }

    public static function findByOrderId(int $orderId) : OrderApi {
        return OrderApi::where('order_id', $orderId)->first();
    }

    public static function getStripeId(Order $order) : string {
        $productApi = OrderApi::where('order_id', $order->id)->first();
        return $productApi->stripe_id;
    }
}
