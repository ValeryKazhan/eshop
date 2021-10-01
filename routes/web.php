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
use Laravel\Cashier\Http\Controllers\PaymentController;




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

Route::get('dump', function (){
    dd(redirect()->route('succeeded')->getTargetUrl());
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
Route::get('/order/{order}/checkout', [OrderController::class, 'pay'])->middleware('auth');

Route::get('/wishlist', [PagesController::class, 'wishlist'])->middleware('auth');
Route::post('/wishlist/product/{product:slug}/add', [UserController::class, 'addToWishlist'])->middleware('auth');
Route::post('/wishlist/product/{product:slug}/remove', [UserController::class, 'removeFromWishlist'])->middleware('auth');
Route::get('/my-account', [PagesController::class, 'myAccount'])->middleware('auth');
Route::get('/my-orders', [PagesController::class, 'myOrders'])->middleware('auth');


Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');
Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::group(['prefix' => '/admin', 'middleware' => 'admin'], function (){
    Route::get('', [AdminController::class, 'menu']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::get('/user/create', [AdminController::class, 'createUser']);
    Route::post('/user/store', [AdminController::class, 'storeUser']);
    Route::get('/user/{user}/delete', [AdminController::class, 'destroyUser']);
    Route::get('/user/{user}/edit', [AdminController::class, 'editUser']);
    Route::post('/user/{user}/update', [AdminController::class, 'updateUser']);

    Route::get('/products', [AdminController::class, 'products']);
    Route::get('/category/{category}/products', [AdminController::class, 'categoryProducts']);
    Route::get('/product/create', [AdminController::class, 'createProduct']);
    Route::post('/product/store', [AdminController::class, 'storeProduct']);
    Route::get('/product/{product}/delete', [AdminController::class, 'destroyProduct']);
    Route::get('/product/{product}/edit', [AdminController::class, 'editProduct']);
    Route::post('/product/{product}/update', [AdminController::class, 'updateProduct']);
    Route::get('/product/{product}/specification/edit', [AdminController::class, 'editProductSpecification']);
    Route::post('/product/{product}/specification/update', [AdminController::class, 'updateProductSpecification']);
    Route::get('/product/{product}/specification/add', [AdminController::class, 'addProductSpecification']);
    Route::post('/product/{product}/specification/add', [AdminController::class, 'storeProductSpecification']);
    Route::get('/product/{product}/specification/{key}/remove', [AdminController::class, 'removeProductSpecification']);

    Route::get('/orders', [AdminController::class, 'orders']);
    Route::get('/user/{user}/orders', [AdminController::class, 'userOrders']);
    Route::get('/order/{order}', [AdminController::class, 'order']);
    Route::get('/order/{order}/delete', [AdminController::class, 'destroyOrder']);
    Route::get('/order/{order}/edit', [AdminController::class, 'editOrder']);
    Route::post('/order/{order}/update', [AdminController::class, 'updateOrder']);

    Route::get('/categories', [AdminController::class, 'categories']);
    Route::get('/category/create', [AdminController::class, 'createCategory']);
    Route::post('/category/store', [AdminController::class, 'storeCategory']);
    Route::get('/category/{category}/delete', [AdminController::class, 'destroyCategory']);
    Route::get('/category/{category}/edit', [AdminController::class, 'editCategory']);
    Route::post('/category/{category}/update', [AdminController::class, 'updateCategory']);

    Route::get('/comments', [AdminController::class, 'comments']);
    Route::get('/product/{product}/comments', [AdminController::class, 'productComments']);
    Route::get('/user/{user}/comments', [AdminController::class, 'userComments']);
    Route::get('/comment/{comment}/delete', [AdminController::class, 'destroyComment']);
    Route::get('/comment/{comment}/edit', [AdminController::class, 'editComment']);
    Route::post('/comment/{comment}/update', [AdminController::class, 'updateComment']);

    Route::get('/reviews', [AdminController::class, 'reviews']);
    Route::get('/product/{product}/reviews', [AdminController::class, 'productReviews']);
    Route::get('/user/{user}/reviews', [AdminController::class, 'userReviews']);
    Route::get('/review/{review}/delete', [AdminController::class, 'destroyReview']);
    Route::get('/review/{review}/edit', [AdminController::class, 'editReview']);
    Route::post('/review/{review}/update', [AdminController::class, 'updateReview']);
});


Route::get('/search-result', [PagesController::class, 'searchPage']);

Route::get('/stripe/{id}', [PaymentController::class, 'show'] );
Route::get('/pay', [PagesController::class, 'pay']);

Route::group(['prefix' => '/stripe', 'middleware' => 'auth'], function(){
    Route::get('/succeeded', function (){
        return view('stripe.succeeded');
    })->name('succeeded');
    Route::get('/not-succeeded', function (){
        return view('stripe.not-succeeded');
    })->name('not-succeeded');
});

Route::post('/newsletter', function (){
    $client = new \MailchimpMarketing\ApiClient();
    $client->setConfig([
        'apiKey' => env('MAILCHIMP_KEY'),
        'server' => 'us5'
    ]);
    $response = $client->lists->addListMember('ed095266c1', [
        'email_address' => request('email'),
        'status' => 'subscribed'
    ]);

    return redirect('/');
});


