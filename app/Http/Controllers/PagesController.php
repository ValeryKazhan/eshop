<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function product(Product $product){
        return view('single-product', [
            'product' => $product
        ]);
    }

    public function category(Category $category){
        return view ('category', [
            'currentCategory' => $category,
            'products' => Product::query()->where('category_id', $category->id)->filter()->get(),//->filter(),
            'categories' => Category::all()
        ]);
    }

    public function searchResult(){
        return view('search-result', [
            'products' => Product::query()->filter()->get(),
            'categories' => Category::query()->filter()->get()
        ]);
    }

    public function index(){
        return view ('index', [
            'products' => Product::bestSold(10),
            'categories' => Category::all()
        ]);
    }



    public function cart(){
        return view('cart', [
            'purchases' => Cart::getPurchases()
        ]);
    }


}
