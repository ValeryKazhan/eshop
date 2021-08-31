<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{

    public function create()
    {

        if (Cart::isEmpty())
            return redirect('/cart');


        return view('order.create', [
            'purchases' => Cart::getPurchases()
        ]);

    }

    public function store()
    {

        if (Cart::isEmpty())
            return redirect('/cart');

        $contacts = request()->validate([
                "country" => ['required', 'max:50', 'min:2'],
                "region" => ['max:255'],
                "locality" => ['required', 'max:50', 'min:2'],
                "street" => ['required', 'max:50', 'min:2'],
                "house" => ['required', 'digits_between:1,3'],
                "postcode" => ['required', 'digits:6'],
                "phone" => ['required','digits_between:5,15']
        ]);



        $order = Order::create([
            'user_id' => auth()->id(),
            'purchases' => Cart::getPurchases(),
            'contacts' => $contacts
        ]);


        Cart::clear();

        return redirect('/order/'.$order->id);
    }

}
