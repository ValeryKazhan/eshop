<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

class CartController extends Controller
{

    public function add(Product $product){


        request()->merge(['id' => $product->id]);
        $attributes = request()->validate([
            'id' => ['required', Rule::exists('products', 'id')],
            'number' => ['required', 'digits_between:1,2']
        ]);

        Cart::addProduct(Product::find($attributes['id']), $attributes['number']);



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
