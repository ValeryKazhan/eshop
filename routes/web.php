<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReviewController;

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
    dd(\App\Models\Product::bestSold(6));
});

Route::get('/', [PagesController::class, 'index']);
Route::get('/category/{category:slug}', [PagesController::class, 'category']);
Route::get('/product/{product:slug}', [PagesController::class, 'product']);
Route::post('/product/{product:slug}/comment', [CommentController::class, 'store'])->middleware('auth');
Route::post('/product/{product:slug}/review', [ReviewController::class, 'store'])->middleware('auth');

Route::get('/cart', [PagesController::class, 'cart']);
Route::post('/cart/product/{product:slug}/add', [CartController::class, 'add']);
Route::post('/cart/store' , [CartController::class, 'store']);
Route::get('/cart/clear', [CartController::class, 'destroy']);
Route::get('/cart/purchase/{id}/delete', [CartController::class, 'remove']);

Route::get('/order/create', [OrderController::class, 'create'])->middleware('auth');
Route::post('/order/store', [OrderController::class, 'store'])->middleware('auth');
Route::get('/order/{order}', [PagesController::class, 'order'])->middleware('auth');

Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');





Route::get('/search-result', [PagesController::class, 'searchPage']);




Route::get('/blog', function (){
    return view('blog');
});






Route::get('/checkout', function (){
    return view('checkout');
});

Route::get('/confirmation', function (){
    return view('!confirmation');
});

Route::get('/confirmation', function (){
    return view('!confirmation');
});





Route::get('/single-blog', function (){
    return view('single-blog');
});



Route::get('/order', function (){
    return view('tracking-order');
});
