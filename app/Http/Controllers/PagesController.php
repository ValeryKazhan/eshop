<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;


class PagesController extends Controller
{
    public function pay(){
        return view('order.stripe');
    }

    public function product(Product $product){
        return view('single-product', [
            'product' => $product
        ]);
    }

    public function category(Category $category){
        return view ('category', [
            'currentCategory' => $category,
            'products' => Product::query()->where('category_id', $category->id)->filter()->paginate(9),
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
    //сделать отдельную таблицу для связи заказов и платежной системы.
    public function index(){
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $s = $stripe->checkout->sessions->retrieve('cs_test_a1HeAp46I8DBGMYWTukD2AEPsvDZmYQtwvUs6tDPm0y0ZDbIj95ZFH7oJo');
        dd($s);
        return view ('index', [
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
            'products' => auth()->user()->getWishlistModels()
        ]);
    }


}
