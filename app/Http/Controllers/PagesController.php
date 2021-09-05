<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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

    public function searchPage(){
        if(request('search') == '')
            return redirect('/');
        return view('search-page', [
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

    public function order(Order $order){
        if(!$order->belongsToAuth())
            return abort(403);
        return view('order', [
            'order' => $order
        ]);
    }

    public function myAccount(){
        return view('my-account', [
            'user' => auth()->user(),
            'activeOrders' => auth()->user()->orders->where('is_delivered', false)
        ]);
    }

    public function wishlist(){
        return view('wishlist', [
            'products' => auth()->user()->wishlist
        ]);
    }


}
