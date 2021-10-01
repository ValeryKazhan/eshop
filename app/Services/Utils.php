<?php


namespace App\Services;


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

}
