<?php


namespace App\Models;

use App\Models\Product;


class Purchase
{
    public Product $product;
    public int $number;

    public function __construct(int $productId, int $number)
    {
        $this->product = Product::find($productId);
        $this->number = $number;
    }

    public function add($number){
        $this->number+=$number;
    }

}
