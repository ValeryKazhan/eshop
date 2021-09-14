<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Validation\Rule;

class ReviewController extends Controller
{
    public function store(Product $product){
        request()->merge(['product_id' => $product->id]);

        request()->validate([
            'rating' => [Rule::in([1,2,3,4,5])],
            'product_id' => [Rule::notIn(auth()->user()->reviews()->pluck('product_id'))],
            'body' => 'required'
        ]);


        $product->reviews()->create([
            'rating' => request('rating'),
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);
        return back();
    }
}
