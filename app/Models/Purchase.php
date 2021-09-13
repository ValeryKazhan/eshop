<?php


namespace App\Models;

use App\Models\Product;
use function PHPUnit\Framework\throwException;


class Purchase
{
    public Product $product;
    public int $number;
    private int $price;
    private bool $priceIsUnchangeable;

    public function __construct(Product $product, int $number, bool $priceIsUnchangeable = false)
    {
        if(self::numberIsCorrect($number) and self::priceIsCorrect($product->price)){
            $this->product = $product;
            $this->number = $number;
            $this->priceIsUnchangeable = $priceIsUnchangeable;
        } else{
            throwException('the number or price is not correct');
        }

    }

    public function makePriceUnchangeable()
    {
        $this->priceIsUnchangeable = true;
        $this->price = $this->product->price;
    }

    public function priceIsUnchangeable() : bool
    {
        return $this->priceIsUnchangeable;
    }

    public function getPrice() : int
    {
        if($this->priceIsUnchangeable())
            return $this->price;
        else
            return $this->product->price;
    }

    public function add($number){
        $this->number+=$number;
    }

    public function getCost() : int
    {
        return $this->product->price * $this->number;
    }

    public static function toRelatedArray(array $idArray) : array
    {
        $relatedArray = [];
        foreach ($idArray as $productId=>$attributes){
            $number = $attributes['number'];
            $priceIsUnchangeable = $attributes['priceIsUnchangeable'];
            array_push($relatedArray, new Purchase(Product::find($productId), $number, $priceIsUnchangeable));
        }
        return $relatedArray;
    }

    public static function toIdArray(array $relatedArray){
        $idArray = array();
        foreach ($relatedArray as $purchase){
            $idArray[$purchase->product->id] = ['number' => $purchase->number, 'price' => $purchase->getPrice(), 'priceIsUnchangeable' => $purchase->priceIsUnchangeable()];
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
