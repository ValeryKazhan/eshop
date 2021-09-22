<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductApi;
use App\Models\Utils;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {

        $stripeClient = Utils::getStripeClient();
        $stripeClient->products->create([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description
        ]);

        ProductApi::create([
           'product_id' => $product->id,
           'stripe_id' => $product->id
        ]);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        $stripeClient = Utils::getStripeClient();
        $stripeClient->products->update([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description
        ]);

        ProductApi::findByProduct($product)->update([
            'product_id' => $product->id,
            'stripe_id' => $product->id
        ]);

    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        $stripeClient = Utils::getStripeClient();
        $stripeClient->products->delete($product->id);
        ProductApi::findByProduct($product)->delete();
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
