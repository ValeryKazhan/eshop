<?php

namespace App\Models;

class Cart
{
    const KEY = 'cartPurchases';

    public static function setPurchases(array $purchases)
    {
        session()->put(self::KEY, $purchases);
    }

    public static function clear(){
        self::setPurchases(array());
    }

    public static function getPurchases()
    {
        if (session()->get(self::KEY) == null)
            self::setPurchases([]);

        return session()->get(self::KEY);
    }

    public static function isEmpty(){
        return count(self::getPurchases())==0;
    }

    public static function addProduct(Product $product, int $number)
    {
        $purchaseExists = false;
        $purchases = self::getPurchases();

        foreach ($purchases as $purchase) {
            if ($purchase->product->id == $product->id) {
                $purchase->add($number);
                $purchaseExists = true;
                break;
            }
        }

        !$purchaseExists ? array_push($purchases, new Purchase($product, $number)) : null;
        self::setPurchases($purchases);
    }

    public static function deletePurchase(int $purchaseId){
        $purchases = self::getPurchases();
        unset ($purchases[$purchaseId]);
        self::setPurchases($purchases);
    }

    public static function getItemsNumber(){
        $itemsNumber = 0;
        foreach (Cart::getPurchases() as $purchase){
            $itemsNumber+=$purchase->number;
        }
        return $itemsNumber;
    }

}
