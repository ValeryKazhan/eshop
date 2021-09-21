<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\Stripe;

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

    public function store(Request $request)
    {

        if (Cart::isEmpty())
            return redirect('/cart');

        $contacts = $request->validate([
                "country" => ['required', 'max:50', 'min:2'],
                "region" => ['max:255'],
                "locality" => ['required', 'max:50', 'min:2'],
                "street" => ['required', 'max:50', 'min:2'],
                "house" => ['required', 'digits_between:1,3'],
                "index" => ['required', 'min:2', 'max:10'],
                "phone" => ['required','digits_between:5,15']
        ]);

        \Stripe\Stripe::setApiKey(env('stripe_secret'));
        //ОТПРАВЛЯТЬ ДАННЫЕ ПО ЗАКАЗАМ ДЛЯ ПЛАТЁЖНОЙ СИСТЕМЫ.
        $stripeSession = Session::create([
            'line_items' => $productsArray/*[
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'product' => 'prod_KGgBrazT9ne9qi',
                        'unit_amount' => 100
                    ],
                    'quantity' => 1,
                ],
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'product' => 'prod_KGgBaBggDMXMUz',
                        'unit_amount' => 200
                    ],
                    'quantity' => 1,
                ]
            ]*/,
            'payment_method_types' => [
                'card',
            ],
            'mode' => 'payment',
            'success_url' => 'http://eshop.test/product/samsung-galaxy-z-flip3-5g-dual-sim-128gb-8gb-ram-sm-f711b-black',
            'cancel_url' => 'http://eshop.test/product/xiaomi-mi-bluetooth-speaker-mini-grey',
        ]);

        return redirect()->to($stripeSession->url);
        dd($stripeSession);
//        PaymentMethod::

        $order = Order::create([
            'user_id' => auth()->id(),
            'purchases' => Cart::getIdArray(),
            'contacts' => $contacts
        ]);

        Cart::clear();

        return redirect('/order/'.$order->id);
    }

}
