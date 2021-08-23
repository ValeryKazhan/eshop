<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function product(Product $product){
        return view('single-product', [
            'product' => $product
        ]);
    }

}
