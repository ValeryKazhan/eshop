<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BucketController;

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
    dd(session()->get('bucket'));
});

Route::get('/', [PagesController::class, 'index']);

Route::get('/category/{category:slug}', [PagesController::class, 'category']);

Route::get('/product/{product:slug}', [PagesController::class, 'product']);
Route::post('/product/{product:slug}/add', [BucketController::class, 'addPurchase'] );

Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');



Route::get('/search-result', [PagesController::class, 'searchResult']);




Route::get('/blog', function (){
    return view('blog');
});

Route::get('/cart', function (){
    return view('cart');
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





Route::get('/single-blog', function (){
    return view('single-blog');
});



Route::get('/order', function (){
    return view('tracking-order');
});
