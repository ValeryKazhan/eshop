<?php


namespace App\Models;

use function PHPUnit\Framework\throwException;


class Purchase
{
    public Product $product;
    public int $number;
    public int $price;

    public function __construct(Product $product, int $number)
    {
        if (self::numberIsCorrect($number) and self::priceIsCorrect($product->price)) {
            $this->product = $product;
            $this->number = $number;
            $this->price = $product->price;
        } else {
            throwException('the number or price is not correct');
        }
    }

    public function add($number) : void
    {
        $this->number += $number;
    }

    public function getCost() : int
    {
        return $this->product->price * $this->number;
    }

    public static function toRelatedArray(array $idArray): array
    {

        $relatedArray = [];
        foreach ($idArray as $productId => $attributes) {
            $number = $attributes['number'];
            if (self::numberIsCorrect($number))
                array_push($relatedArray, new Purchase(Product::find($productId), $number));
        }
        return $relatedArray;
    }

    public static function toIdArray(array $relatedArray) : array
    {
        $idArray = array();
        foreach ($relatedArray as $purchase) {
            $idArray[$purchase->product->id] = ['number' => $purchase->number, 'price' => $purchase->price];
        }
        return $idArray;
    }

    private static function numberIsCorrect($number) : bool
    {
        return $number > 0;
    }

    private static function priceIsCorrect($price) : bool
    {
        return $price > 0;
    }


}
