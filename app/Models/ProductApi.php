<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductApi extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public static function findByProduct(Product $product) : ProductApi {
        return ProductApi::where('product_id', $product->id)->first();
    }

    public static function findByProductId(int $productId) : ProductApi {
        return ProductApi::where('product_id', $productId)->first();
    }

    public static function getStripeId(Product $product) : string {
        $productApi = ProductApi::where('product_id', $product->id)->first();
        return $productApi->stripe_id;
    }

}
