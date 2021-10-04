<?php

namespace App\Services\Cart;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class SessionCart implements Cart
{
    const KEY = 'cartPurchases';

    private array $session;

    public function __construct(Request $request){
        $this->session = $request->session();
    }

    public function setPurchases(array $purchases) : void
    {
        $this->session->put(self::KEY, $purchases);
    }

    public function clear() : void
    {
        self::setPurchases(array());
    }

    public function getPurchases() : array
    {
        if ($this->session->get(self::KEY) == null)
            self::setPurchases([]);

        return $this->session->get(self::KEY);
    }

    public function getIdArray() : array
    {
        return Purchase::toIdArray(self::getPurchases());
    }

    public function isEmpty() : bool
    {
        return count(self::getPurchases())===0;
    }

    public function addProduct(Product $product, int $number) : void
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

    public function deletePurchase(int $purchaseId) : void
    {
        $purchases = self::getPurchases();
        unset ($purchases[$purchaseId]);
        self::setPurchases($purchases);
    }

    public function getItemsNumber() : int
    {
        $itemsNumber = 0;
        foreach (self::getPurchases() as $purchase){
            $itemsNumber+=$purchase->number;
        }
        return $itemsNumber;
    }

    public function getTotalCost() : string
    {
        $sum = 0;
        foreach (self::getPurchases() as $purchase){
            $sum+=$purchase->price;
        }
        return $sum;
    }
}
