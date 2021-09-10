<?php


namespace App\Models;

use App\Models\Product;


class Purchase
{
    public Product $product;
    public int $number;
    public int $price;

    public function __construct(Product $product, int $number)
    {
        $this->product = $product;
        $this->number = $number;
        $this->price = $product->price;
    }

    public function add($number){
        $this->number+=$number;
    }

    public function getCost(){
        return $this->product->price * $this->number;
    }

    public static function toRelatedArray(array $idArray){
        $relatedArray = array();
        foreach ($idArray as $productId=>$attributes){
            $number = $attributes['number'];
            $price = $attributes['price'];
            if(self::numberIsCorrect($number) and self::priceIsCorrect($price))
                array_push($relatedArray, new Purchase($productId, $number));
        }
        return $relatedArray;
    }

    public static function toIdArray(array $relatedArray){
        $idArray = array();
        foreach ($relatedArray as $purchase){
            $idArray[$purchase->product->id] = ['number' => $purchase->number, 'price' => $purchase->price];
        }
        return $idArray;
    }

    private static function numberIsCorrect($number){
        return $number > 0;
    }
    private static function priceIsCorrect($price){
        return $price > 0;
    }



}
