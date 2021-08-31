<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Product $product){

        request()->validate([
            'body' => 'required'
        ]);
        $product->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);
        return back();
    }
}
