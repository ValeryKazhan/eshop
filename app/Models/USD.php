<?php

namespace App\Models;

class USD
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getUSD() : USD{
        return $this->value;
    }

//    public function __toString() : string {
//        return
//    }

}
