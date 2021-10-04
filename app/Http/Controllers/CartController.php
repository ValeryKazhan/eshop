<?php

namespace App\Http\Controllers;

//use App\Models\Cart;
use App\Services\Cart\Cart;
use App\Models\Product;
use App\Models\Purchase;
use App\Providers\CartServiceProvider;
use App\Services\Cart\SessionCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CartController extends Controller
{



    public function add(Cart $cart, Product $product, Request $request){

        $request->merge(['id' => $product->id]);
        $attributes = $request->validate([
            'id' => ['required', Rule::exists('products', 'id')],
            'number' => ['required', 'digits_between:1,2']
        ]);

        $cart->addProduct(Product::query()->find($attributes['id']), $attributes['number']);



        return back();
    }

    public function remove(Cart $cart, $id){
        $cart->deletePurchase($id);
        return back();
    }

    public function store(Cart $cart, Request $request){
        $purchases=$request->all();
        unset($purchases['_token']);
        $cart->setPurchases(Purchase::toRelatedArray($purchases));
        return back();
    }

    public function destroy(Cart $cart){
        $cart->clear();
        return back();
    }

}
