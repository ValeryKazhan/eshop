<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

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
            'products' => Product::query()->where('category_id', $category->id)->filter()->paginate(9),//->filter(),
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
//            'products' => Product::all(),
            'products' => Product::bestSold(10),
            'categories' => Category::query()->paginate(8)
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

    public function myOrders(){
        $activeOrders = array();
        $completedOrders = array();
        foreach (auth()->user()->orders as $order){
            $order->is_delivered? array_push($completedOrders, $order) : array_push($activeOrders, $order);
        }
        return view('my-orders', [
            'activeOrders' => $activeOrders,
            'completedOrders' => $completedOrders
        ]);
    }

    public function wishlist(){
        return view('wishlist', [
            'products' => auth()->user()->wishlist
        ]);
    }


}
