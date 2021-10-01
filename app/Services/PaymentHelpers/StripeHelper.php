<?php

namespace App\Services\PaymentHelpers;

use App\Models\ProductApi;
use App\Models\Purchase;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\StripeClient;
use App\Models\Product;

class StripeHelper
{


    public function __construct()
    {

    }

    public static function paymentIntent(){
       // $stripe = self::getClient()->paymentIntents->
    }

    public static function setSecretKey() : void {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
    }

    public static function getClient(): StripeClient {
        return new StripeClient(config('services.stripe.secret'));
    }

    public static function createProduct(Product $product) : void {
        $stripeClient = self::getClient();
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
     * @throws ApiErrorException
     */
    public static function updateProduct (Product $product) : void  {
        $stripe = self::getClient();
        $stripe->products->update($product->id, [
            'name' => $product->name,
            'description' => $product->description
        ]);
    }

    public static function destroyProduct(Product $product) : void {
        $stripeClient = self::getClient();
        $stripeClient->products->delete($product->id);
        ProductApi::findByProduct($product)->delete();
    }

    public static function purchasesToLineItems(array $purchases) : array {
        $stripePurchases = array();
        foreach ($purchases as $purchase){
            array_push($stripePurchases, self::purchaseToStripe($purchase));
        }
        return $stripePurchases;
    }

    private static function purchaseToStripe(Purchase $purchase) : array {
        return [
            'price_data' => [
                'currency' => 'USD',
                'product' => ProductApi::findByProduct($purchase->product)->stripe_id,
                'unit_amount' => $purchase->getPriceInCents(),
            ],
            'quantity' => $purchase->number,
        ];
    }
}
