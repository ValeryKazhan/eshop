<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dump', function () {
    $order = \App\Models\Order::find(3);
    //$purchases = json_decode($purchases, true);
    return var_dump($order->purchases);
});

Route::get('/', function (){
   return view('index');
});

Route::get('/blog', function (){
    return view('blog');
});

Route::get('/cart', function (){
    return view('cart');
});

Route::get('/category', function (){
    return view('category');
});

Route::get('/checkout', function (){
    return view('checkout');
});

Route::get('/confirmation', function (){
    return view('confirmation');
});

Route::get('/confirmation', function (){
    return view('confirmation');
});

Route::get('/login', function (){
    return view('login');
});

Route::get('/register', function (){
    return view('register');
});

Route::get('/single-blog', function (){
    return view('single-blog');
});

Route::get('/product/{product}', [PagesController::class, 'product']);

Route::get('/order', function (){
    return view('tracking-order');
});
