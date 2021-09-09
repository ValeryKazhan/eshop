<?php


namespace App\Models;


class Utils
{
   public static function backIfNoRequest()
   {
        if(!request())
            return back();
    }
}
