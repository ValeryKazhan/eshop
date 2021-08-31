<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CartController extends Controller
{

    public function add(){
        $attributes = request()->validate([
            'product_id' => ['required', Rule::exists('products', 'id')],
            'number' => ['required', 'digits_between:1,2']
        ]);
        Cart::addPurchase($attributes['product_id'], $attributes['number']);
        return back();
    }

    public function remove($id){
        Cart::deletePurchase($id);
        return back();
    }

    public function store(){
        $purchases=request()->all();
        unset($purchases['_token']);
        Cart::setPurchases(Purchase::toRelatedArray($purchases));
        return back();
    }

    public function destroy(){
        Cart::clear();
        return back();
    }

}
