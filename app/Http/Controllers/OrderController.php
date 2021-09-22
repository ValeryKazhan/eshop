<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderApi;
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



        $stripeSession = Session::create([
            'line_items' => Cart::toStripeLineItems(),
            'payment_method_types' => [
                'card',
            ],
            'mode' => 'payment',
            'success_url' => 'http://eshop.test/',//redirect()->route('succeeded')->getTargetUrl(),
            'cancel_url' => 'http://eshop.test/',
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'purchases' => Cart::getIdArray(),
            'contacts' => $contacts
        ]);

        OrderApi::create([
            'order_id' => $order->id,
            'stripe_id' =>  $stripeSession->id
        ]);

        Cart::clear();

        return redirect()->to($stripeSession->url);

    }

}
