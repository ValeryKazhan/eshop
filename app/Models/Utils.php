<?php


namespace App\Models;


class Utils
{
   public static function backIfNoRequest() : bool
   {
        if(!request())
            return back();
    }
}
