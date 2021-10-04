<?php

namespace App\Services\Cart;

use App\Models\Product;

interface Cart
{
    public function setPurchases(array $purchases) : void;

    public function clear() : void;

    public function getPurchases() : array;

    public function getIdArray() : array;

    public function isEmpty() : bool;

    public function addProduct(Product $product, int $number) : void;

    public function deletePurchase(int $purchaseId) : void;

    public function getItemsNumber() : int;

    public function getTotalCost() : string;
}
