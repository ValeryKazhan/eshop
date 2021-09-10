<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create.blade.php something great!
|
*/

Route::get('/dump', function () {
    dd(\App\Models\Cart::getPurchases());
});
Route::get('/', [PagesController::class, 'index']);
Route::get('/category/{category:slug}', [PagesController::class, 'category']);
Route::get('/product/{product:slug}', [PagesController::class, 'product']);
Route::post('/product/{product:slug}/comment', [CommentController::class, 'store'])->middleware('auth');
Route::post('/product/{product:slug}/review', [ReviewController::class, 'store'])->middleware('auth');

Route::group(['prefix' => '/cart'], function () {
    Route::get('', [PagesController::class, 'cart']);
    Route::post('/product/{product:slug}/add', [CartController::class, 'add']);
    Route::post('/store' , [CartController::class, 'store']);
    Route::get('/clear', [CartController::class, 'destroy']);
    Route::get('/purchase/{id}/delete', [CartController::class, 'remove']);
});


Route::get('/order/create.blade.php', [OrderController::class, 'create'])->middleware('auth');
Route::post('/order/store', [OrderController::class, 'store'])->middleware('auth');
Route::get('/order/{order}', [PagesController::class, 'order'])->middleware('auth');

Route::get('/wishlist', [PagesController::class, 'wishlist'])->middleware('auth');
Route::post('/wishlist/product/{product:slug}/add', [UserController::class, 'addToWishlist'])->middleware('auth');
Route::post('/wishlist/product/{product:slug}/remove', [UserController::class, 'removeFromWishlist'])->middleware('auth');
Route::get('/my-account', [PagesController::class, 'myAccount'])->middleware('auth');
Route::get('/my-orders', [PagesController::class, 'myOrders'])->middleware('auth');


Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');
Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');


Route::get('/admin', [AdminController::class, 'menu'])->middleware('admin');

Route::get('/admin/users', [AdminController::class, 'users'])->middleware('admin');
Route::get('/admin/user/create', [AdminController::class, 'createUser'])->middleware('admin');
Route::post('/admin/user/store', [AdminController::class, 'storeUser'])->middleware('admin');
Route::get('/admin/user/{user}/delete', [AdminController::class, 'destroyUser'])->middleware('admin');
Route::get('/admin/user/{user}/edit', [AdminController::class, 'editUser'])->middleware('admin');
Route::post('/admin/user/{user}/update', [AdminController::class, 'updateUser'])->middleware('admin');

Route::get('/admin/products', [AdminController::class, 'products'])->middleware('admin');
Route::get('/admin/category/{category}/products', [AdminController::class, 'categoryProducts'])->middleware('admin');
Route::get('/admin/product/create', [AdminController::class, 'createProduct'])->middleware('admin');
Route::post('/admin/product/store', [AdminController::class, 'storeProduct'])->middleware('admin');
Route::get('/admin/product/{product}/delete', [AdminController::class, 'destroyProduct'])->middleware('admin');
Route::get('/admin/product/{product}/edit', [AdminController::class, 'editProduct'])->middleware('admin');
Route::post('/admin/product/{product}/update', [AdminController::class, 'updateProduct'])->middleware('admin');
Route::get('/admin/product/{product}/specification/edit', [AdminController::class, 'editProductSpecification'])->middleware('admin');
Route::post('/admin/product/{product}/specification/update', [AdminController::class, 'updateProductSpecification'])->middleware('admin');
Route::get('/admin/product/{product}/specification/add', [AdminController::class, 'addProductSpecification'])->middleware('admin');
Route::post('/admin/product/{product}/specification/add', [AdminController::class, 'storeProductSpecification'])->middleware('admin');
Route::get('/admin/product/{product}/specification/{key}/remove', [AdminController::class, 'removeProductSpecification'])->middleware('admin');

Route::get('/admin/orders', [AdminController::class, 'orders'])->middleware('admin');
Route::get('/admin/user/{user}/orders', [AdminController::class, 'userOrders'])->middleware('admin');
Route::get('/admin/order/create', [AdminController::class, 'createOrder'])->middleware('admin');
Route::post('/admin/order/store', [AdminController::class, 'storeOrder'])->middleware('admin');
Route::get('/admin/order/{order}/delete', [AdminController::class, 'destroyOrder'])->middleware('admin');
Route::get('/admin/order/{order}/edit', [AdminController::class, 'editOrder'])->middleware('admin');
Route::post('/admin/order/{order}/update', [AdminController::class, 'updateOrder'])->middleware('admin');

Route::get('/admin/categories', [AdminController::class, 'categories'])->middleware('admin');


Route::get('/admin/comments', [AdminController::class, 'comments'])->middleware('admin');
Route::get('/admin/reviews', [AdminController::class, 'reviews'])->middleware('admin');


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
