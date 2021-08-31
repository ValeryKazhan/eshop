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

    public function getCost(){
        return $this->product->price * $this->number;
    }

    public static function toRelatedArray(array $idArray){
        $relatedArray = array();
        foreach ($idArray as $productId=>$number){
            if(self::numberIsCorrect($number))
                array_push($relatedArray, new Purchase($productId, $number));
        }
        return $relatedArray;
    }

    public static function toIdArray(array $relatedArray){
        $idArray = array();
        foreach ($relatedArray as $purchase){
            $idArray[$purchase->product->id] = $purchase->number;
        }
        return $idArray;
    }

    private static function numberIsCorrect($number){
        return $number > 0;
    }



}
