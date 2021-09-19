<?php


namespace App\Models;


class Utils
{

    const NO_IMAGE_PATH = '/img/no-image.png';

   public static function backIfNoRequest()
   {
        if(!request())
            return back();
    }
}
