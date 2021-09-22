<?php


namespace App\Models;


use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class Utils
{


    const NO_IMAGE_PATH = '/img/no-image.png';

   public static function backIfNoRequest()
   {
        if(!request())
            return back();
    }

    public static function getStripeClient(): StripeClient
    {
        return new StripeClient(env('STRIPE_SECRET'));
    }

    public static function createStripeProduct(Product $product) : void {
        $stripeClient = self::getStripeClient();
        $stripeClient->products->create([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description
        ]);
    }

    public static function updateStripeProduct(Product $product) : void  {
        /**
         * @throws ApiErrorException
         */

        $stripeClient = self::getStripeClient();
        $stripeClient->products->update($product->id, [
            'name' => $product->name,
            'description' => $product->description
        ]);
    }

    public static function destroyStripeProduct(Product $product) : void {
        $stripeClient = self::getStripeClient();
        $stripeClient->products->delete($product->id);
    }



}
