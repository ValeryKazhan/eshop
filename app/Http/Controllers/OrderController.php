<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderApi;
use App\Services\PaymentHelpers\StripeHelper;
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

        //\Stripe\Stripe::setApiKey(env('stripe_secret'));

        $order = Order::create([
            'user_id' => auth()->id(),
            'purchases' => Cart::getIdArray(),
            'contacts' => $contacts
        ]);
        Cart::clear();
        return redirect('/order/'.$order->id);
    }

    public function pay(Order $order) {

        $stripeSession = Session::create([
            'line_items' => StripeHelper::purchasesToLineItems($order->getPurchasesModels()),
            'payment_method_types' => [
                'card',
            ],
            'mode' => 'payment',
            'success_url' => url('/order/'.$order->id),
            'cancel_url' => url('/order/'.$order->id),
        ]);

        OrderApi::create([
            'order_id' => $order->id,
            'stripe_id' =>  $stripeSession->id
        ]);

        dd($stripeSession);
        return redirect()->to($stripeSession->url);

    }

}
